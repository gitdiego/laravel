<?php  
    class UserstableSeeder extends Seeder {  
   
    public function run() {  
        DB::table('users')->delete();  
   
        User::create(array(  
            'username' => 'user1',  
            'password' => Hash::make('pass1'),  
            'email' => 'prueba1@prueba.com'  
        ));  
   
        User::create(array(  
            'username' => 'user2',  
            'password' => Hash::make('pass2'),  
            'email' => 'prueba2@prueba.com'  
        ));  
    }   
} 

?>
