<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostsModel;
use App\Models\UsersModel;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $usersmodel = new UsersModel();
        $userId = $usersmodel->getUser();

        if ($userId !== null) {
            PostsModel::create([
                'u_id' => $userId,
                'date' => now(),
                'title' => "Két éve még lelkesedett az akkugyárért az iváncsai polgármester, mostanra elfogyott a türelme a zaj miatt",
                'content' => "A megengedettnél jóval hangosabb az iváncsai akkumulátorgyár, ami éjszakánként gyakran erős, zavaros hangokat ad ki. Molnár Tibor iváncsai polgármester ezért először a gyár vezetéséhez fordult, de miután nem történt semmi, a környezetvédelmi hatóságnál is bejelentést tett – írja a Mérce a település hivatalos Facebook-oldalára hivatkozva.
                                A történet érdekessége, hogy a fideszes hátterű független polgármester, Molnár Tibor két éve még támogatta a gyár felépítését, lelkes volt az akkugyárért, és azt a településnek és a vidéknek is nagy lehetőségnek nevezte. Akkor azt írta: hosszú előkészítő munka eredménye, hogy az SK Iváncsára érkezik. Most már nem olyan elégedett a gyárral.",
            ]);
        }
    }
}
