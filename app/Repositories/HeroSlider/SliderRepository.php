<?php
    namespace App\Repositories\HeroSlider;

    use App\Models\HeroSlider;
    use App\Repositories\HeroSlider\SliderRepositoryInterface;

    class SliderRepository implements SliderRepositoryInterface
    {
        public function all()
        {
            return HeroSlider::all();
        }

        public function find($id)
        {
            return HeroSlider::find($id);
        }

        public function create(array $data)
        {
            return HeroSlider::create($data);
        }

        public function update(array $data, $id)
        {
            return HeroSlider::where('id', $id)->update($data);
        }

        public function delete($id)
        {
            return HeroSlider::where('id', $id)->delete();
        }

        public function getForDataTable()
        {
            return HeroSlider::query();
        }
    }
?>
