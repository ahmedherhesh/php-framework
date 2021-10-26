<?php
require_once 'autoload.php';
use Classes\DB;

// This is Examples, For more details please read this readme.txt file

// DB::run()->table('cities')->create($_GET);
// DB::run()->table('cities')->get();
// DB::run()->table('cities')->where(['name_en', '!=', 'mansoura'])->get();
// DB::run()->table('cities')->first();
// DB::run()->table('cities')->orderBy('id','desc')->first();
// DB::run()->table('cities')->where(['name_en', '!=', 'mansoura'])->first();
// DB::run()->table('cities')->update(['name_ar' => 'name_ar']);
// DB::run()->table('cities')->where(['id', '=', '10'])->update(['governorate_id' => '4']);
// DB::run()->table('cities')->delete();
// DB::run()->table('cities')->where(['id', '=', '9'])->delete();