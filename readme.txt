require_once 'autoload.php';
use Classes\DB;

$DB = [
    run()     => DB::run(),                                   //for run DB
    table()   => DB::run()->table('cities'),                 //select table
    create()  => DB::run()->table('cities')->create($_GET), //use get or post for add recorde auto or associative array
    get()     => DB::run()->table('cities')->get(),        //get all
    where()   => DB::run()->table('cities')->where(['name_en', '!=', 'mansoura'])->get(), //use where
    first()   => DB::run()->table('cities')->first(),  //get one record
    orderBy() => DB::run()->table('cities')->orderBy('id','desc')->first(), //ordering 
    update()  => DB::run()->table('cities')->where(['id', '=', 'city_id'])->update(['name_ar' => 'name_ar']), //update, if you need update all remove where
    delete()  => DB::run()->table('cities')->where(['id', '=', 'city_id'])->delete(), //delete, if you need delete all remove where
];