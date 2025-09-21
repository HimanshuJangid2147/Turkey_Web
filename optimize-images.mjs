import sharp from 'sharp';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

class ImageOptimizer {
    constructor() {
        this.inputDir = path.join(__dirname, 'public/images');
        this.outputDir = path.join(__dirname, 'public/images/optimized');
        this.webpDir = path.join(this.outputDir, 'webp');
        this.jpgDir = path.join(this.outputDir, 'jpg');
        this.pngDir = path.join(this.outputDir, 'png');
        this.originalDir = path.join(__dirname, 'public/images/original');

        this.sizes = {
            small: 480,
            medium: 768,
            large: 1200,
            original: null
        };

        this.init();
    }

    init() {
        this.createDirectories();
        this.processImages();
    }

    createDirectories() {
        const dirs = [
            this.outputDir,
            this.webpDir,
            this.jpgDir,
            this.pngDir,
            this.originalDir
        ];

        dirs.forEach(dir => {
            if (!fs.existsSync(dir)) {
                fs.mkdirSync(dir, { recursive: true });
                console.log(`✅ Created directory: ${dir}`);
            }
        });
    }

    async processImages() {
        const images = this.getImageFiles();

        console.log(`\n🔍 Found ${images.length} images to optimize:\n`);

        for (const image of images) {
            console.log(`📸 Processing: ${path.basename(image)}`);
            await this.optimizeImage(image);
        }

        console.log('\n🎉 Image optimization complete!');
        this.showResults();
    }

    getImageFiles() {
        const extensions = ['.jpg', '.jpeg', '.png', '.webp', '.jfif'];
        const files = [];

        function scanDir(dir) {
            const items = fs.readdirSync(dir);

            for (const item of items) {
                const fullPath = path.join(dir, item);
                const stat = fs.statSync(fullPath);

                if (stat.isDirectory()) {
                    scanDir(fullPath);
                } else {
                    const ext = path.extname(item).toLowerCase();
                    if (extensions.includes(ext)) {
                        files.push(fullPath);
                    }
                }
            }
        }

        scanDir(this.inputDir);
        return files;
    }

    async optimizeImage(imagePath) {
        const filename = path.basename(imagePath);
        const nameWithoutExt = path.parse(filename).name;

        try {
            // Backup original
            fs.copyFileSync(imagePath, path.join(this.originalDir, filename));

            const image = sharp(imagePath);
            const metadata = await image.metadata();

            console.log(`   📊 Original: ${metadata.width}x${metadata.height}, ${metadata.format}`);

            // Optimize based on format
            if (metadata.format === 'jpeg') {
                await this.optimizeJPEG(image, nameWithoutExt);
            } else if (metadata.format === 'png') {
                await this.optimizePNG(image, nameWithoutExt);
            } else if (metadata.format === 'webp') {
                await this.optimizeWebP(image, nameWithoutExt);
            } else if (metadata.format === 'gif') {
                await this.optimizeGIF(image, nameWithoutExt);
            }

        } catch (error) {
            console.error(`❌ Error processing ${filename}:`, error.message);
        }
    }

    async optimizeJPEG(image, nameWithoutExt) {
        // Create WebP version (best compression)
        await image
            .webp({ quality: 85 })
            .toFile(path.join(this.webpDir, `${nameWithoutExt}.webp`));

        // Create optimized JPEG
        await image
            .jpeg({ quality: 85, progressive: true })
            .toFile(path.join(this.jpgDir, `${nameWithoutExt}.jpg`));

        // Create responsive sizes
        for (const [sizeName, width] of Object.entries(this.sizes)) {
            if (width) {
                await image
                    .resize(width, null, { withoutEnlargement: true })
                    .webp({ quality: 85 })
                    .toFile(path.join(this.webpDir, sizeName, `${nameWithoutExt}-${sizeName}.webp`));
            }
        }
    }

    async optimizePNG(image, nameWithoutExt) {
        // Create WebP version
        await image
            .webp({ quality: 85 })
            .toFile(path.join(this.webpDir, `${nameWithoutExt}.webp`));

        // Create optimized PNG
        await image
            .png({ quality: 85, compressionLevel: 9 })
            .toFile(path.join(this.pngDir, `${nameWithoutExt}.png`));

        // Create responsive sizes
        for (const [sizeName, width] of Object.entries(this.sizes)) {
            if (width) {
                await image
                    .resize(width, null, { withoutEnlargement: true })
                    .webp({ quality: 85 })
                    .toFile(path.join(this.webpDir, sizeName, `${nameWithoutExt}-${sizeName}.webp`));
            }
        }
    }

    async optimizeWebP(image, nameWithoutExt) {
        // Keep as WebP (already optimized format)
        await image
            .webp({ quality: 85 })
            .toFile(path.join(this.webpDir, `${nameWithoutExt}.webp`));

        // Create responsive sizes
        for (const [sizeName, width] of Object.entries(this.sizes)) {
            if (width) {
                await image
                    .resize(width, null, { withoutEnlargement: true })
                    .webp({ quality: 85 })
                    .toFile(path.join(this.webpDir, sizeName, `${nameWithoutExt}-${sizeName}.webp`));
            }
        }
    }

    async optimizeGIF(image, nameWithoutExt) {
        // Convert GIF to WebP
        await image
            .webp({ quality: 85 })
            .toFile(path.join(this.webpDir, `${nameWithoutExt}.webp`));
    }

    showResults() {
        console.log('\n📊 OPTIMIZATION RESULTS:');
        console.log('=' .repeat(50));

        const getDirSize = (dirPath) => {
            try {
                const files = fs.readdirSync(dirPath);
                let totalSize = 0;
                for (const file of files) {
                    const filePath = path.join(dirPath, file);
                    const stat = fs.statSync(filePath);
                    if (stat.isFile()) {
                        totalSize += stat.size;
                    }
                }
                return totalSize;
            } catch {
                return 0;
            }
        };

        const originalSize = this.getDirSize(this.inputDir);
        const optimizedSize = this.getDirSize(this.webpDir) + this.getDirSize(this.jpgDir) + this.getDirSize(this.pngDir);
        const reduction = ((originalSize - optimizedSize) / originalSize * 100).toFixed(1);

        console.log(`📁 Original images: ${(originalSize / 1024 / 1024).toFixed(2)} MB`);
        console.log(`✨ Optimized images: ${(optimizedSize / 1024 / 1024).toFixed(2)} MB`);
        console.log(`💾 Size reduction: ${reduction}%`);
        console.log(`🎯 Files optimized: ${fs.readdirSync(this.webpDir).length + fs.readdirSync(this.jpgDir).length + fs.readdirSync(this.pngDir).length}`);

        console.log('\n📁 Output directories created:');
        console.log(`   ${this.webpDir}/`);
        console.log(`   ${this.jpgDir}/`);
        console.log(`   ${this.pngDir}/`);
        console.log(`   ${this.originalDir}/ (backups)`);
    }

    getDirSize(dirPath) {
        try {
            const files = fs.readdirSync(dirPath);
            let totalSize = 0;
            for (const file of files) {
                const filePath = path.join(dirPath, file);
                const stat = fs.statSync(filePath);
                if (stat.isFile()) {
                    totalSize += stat.size;
                }
            }
            return totalSize;
        } catch {
            return 0;
        }
    }
}

// Run the optimizer
console.log('🚀 Starting Image Optimization...\n');
new ImageOptimizer();
