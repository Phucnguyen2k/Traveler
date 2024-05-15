<?php 
class Author {
    public $name;
    public $avatar;
    public $desc;

    function __construct($name, $avatar, $desc)
    {
        $this->name = $name;
        $this->avatar = $avatar;
        $this->desc = $desc;
    }

    public static function all(): array {
        return [
            new Author('Tappei Nagatsuki', 'authors/1.jpg', 'Notable Works'),
            new Author('Wataru Watari', 'authors/2.jpg', 'Notable Works'),
            new Author('Toshihiko Kojima', 'authors/3.jpg', 'Notable Works'),
            new Author('F. Fujio Fujiko', 'authors/4.jpg', 'Designation'),
        ];
    }
}

class CategoryMovie
{
    public $name;
    public $amount;

    public $thumbnail;
    function __construct($name, $amount, $thumbnail)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->thumbnail = $thumbnail;
    }

    public static function all(): array {
        return [
            new CategoryMovie('Action', '100+ Phim', 'action.jpg'),
            new CategoryMovie('Romance', '120+ Phim', 'romcom.png'),
            new CategoryMovie('Fantasy', '130+ Phim', 'fantasy.jpg'),
            new CategoryMovie('Sci-fi', '300+ Phim', 'sci-fi.jpg'),
            new CategoryMovie('Adventure', '700+ Phim', 'adventure.jpg'),
            new CategoryMovie('Isekai', '1000+ Phim', 'isekai.jpg'),
        ];
    }
}

class LightNovel
{
    public $title;
    public $cover;
    public $author;
    public $star;
    public $store;
    public $price;
    public $discount;

    public function __construct($title, $cover, $author, $star, $store, $price, $discount)
    {
        $this->title = $title;
        $this->cover = $cover;
        $this->author = $author;
        $this->star = $star;
        $this->store = $store;
        $this->price = $price;
        $this->discount = $discount;
    }

    public static function all(): array {
        return [
            new LightNovel('Thiên sứ nhà bên (Bản đặt biệt)', '1.jpg', 'Inujun', 4, 87, 143.000, '-20%'),
            new LightNovel('Gửi Tới Người Mùa Đông', '2.jpg', 'Saekisan', 5, 76, 303.000, '-30%'),
            new LightNovel('Tháng 8 Cùng Em Và Những Ký Ức Vụn Vỡ', '3.jpg', 'Natsuki Amasawa', 5, 65, 86.000, '-20%'),
            new LightNovel('Ba Ngày Hạnh Phúc', '4.jpg', 'Sugaru Miaki', 5, 65, 120.000, '-20%'),
            new LightNovel('Spice & Wolf', '5.jpg', 'Hasekura Isuna', 5, 13, 43.000, '-20%'),
            new LightNovel('The Melancholy of Haruhi Suzumiya', '6.jpg', 'Nagaru Tanigawa', 4, 32, 213.000, '-20%'),
            new LightNovel('Konosuba:Wonderful World!', '7.jpg', 'Natsume Akatsuki', 3, 54, 156.000, '-30%'),
            new LightNovel('Re:ZERO -Starting Life in Another World', '8.jpg', 'Tappei Nagatsuki', 4, 43, 143.000, '-20%'),
        ];
    }

}