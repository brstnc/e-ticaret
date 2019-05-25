<?php

use App\Models\Category;
$category_id = $_POST['up_categories'];
$low_categories = Category::all()->where('up_id', true);
echo '<select id="low_category">';
foreach ($low_categories as $category) {
    echo '<option value"'.$category->id.'">'.$category->category_name.'</option>';
}
echo '<select>';
?>