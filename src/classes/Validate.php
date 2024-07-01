<?php

class Validate
{
    public static function is_number(int $number, int $min = 0, int $max = 100): bool
    {
        return ($number >= $min and $number <= $max);
    }

    public static function is_text(string $text, int $min = 1, int $max = 100): bool
    {
        return (strlen($text) >= $min and strlen($text) <= 100);
    }

    public static function is_user_id(int $id, $users) :bool {
        foreach($users as $user) {
            if($user['id'] == $id){
                return true;
            }
        }

        return false;
    }

    public static function is_category_id(int $id, $categories) : bool {
        foreach($categories as $category) {
            if($category['id'] == $id) {
                return true;
            }
        } return false;
    }
}