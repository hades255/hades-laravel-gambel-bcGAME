<?php

namespace App\Http\Controllers;

use App\Box;
use App\Task;
use App\Build;
use App\Game;
use App\Notification;
use App\PromoBotList;
use App\Promocode;
use App\Subscription;
use App\Transaction;
use App\User;
use App\Withdraw;
use App\Payment;
use DateTimeZone;
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;
use Illuminate\Support\Facades\Storage;
use Request;
use Auth;
use App\Settings;
use GuzzleHttp\Client as Client2;

class AdminController extends Controller {

    public static function log($type, $data, $user_id = null) {
        if($user_id == null && Auth::guest()) return;
        $json = json_decode(file_get_contents(storage_path().'/actions.json'), true);

        $json = array_prepend($json, array(
            "id" => $user_id == null ? Auth::user()->id : $user_id,
            "type" => $type,
            "time" => time(),
            "data" => $data
        ));

        file_put_contents(storage_path().'/actions.json', json_encode($json));
    }

    public function page($page = 'main') {
        if(!view()->exists('admin.'.$page)) return response()->view('errors.404', [], 404);

        $settings = Settings::where('id', 1)->first();
        if(Request::ajax()) return view('admin.'.$page, compact('settings'));
        return view('admin.layout')->with('page', view('admin.'.$page, compact('settings')));
    }

    public function notificationBrowser($message) {
        @file_get_contents((str_contains(url('/'), "test") ? 'https://test.ru' : 'http://localhost') . ':49300/send?message='.$message);
		return json_encode(['success' => $message]);
    }

    public function saveSubscription($json) {
        Subscription::insert([
            'json' => $json
        ]);
        return json_encode(['success' => $json]);
    }

    public function getSubscribers() {
        return json_encode(Subscription::get());
    }

    public static function mute($to, $from, $minutes) {
        if($from != null) AdminController::log(6, array('id' => $to, 'minutes' => $minutes), $from);

        $user = User::where('id', $to)->first();
        if($user == null) return response('0');

        $user->mute = time() + ($minutes * 60);
        $user->save();

        return response('1');
    }

    public function global_ban($to, $from) {
        $user = User::where('id', $to)->first();

        AdminController::log(5, array('id' => $to, 'type' => $user->global_ban == 0 ? 'ban' : 'unban'), $from);

        if($user == null) return response('0');

        $user->global_ban = $user->global_ban == 0 ? 1 : 0;
        $user->save();

        return response('1');
    }

    public function setting($name, $value) {
        Settings::where('id', 1)->first()->update([
            $name => $value
        ]);
		if($name == 'techworks' && $value == 1)
		{
		touch(storage_path().'/meta/server.down');
			        $this->log(9, array(
            'name' => $name
        ));
		}
		if($name == 'techworks' && $value == 0)
		{
			@unlink(storage_path().'/meta/server.down');
			        $this->log(10, array(
            'name' => $name
        ));
		}
        return '1';
    }
	
	    public function email_confirmed($id, $value) {
			$user = User::where('id', $id)->first();
        User::where('id', $id)->first()->update([
            'email_confirmed' => $value
        ]);
        return '1';
    }


    public function fake_f_edit($time, $chattime, $chatwithdraw, $fakeonline_games, $fakesumusers, $fakesumwithdraw) {
		if($time < 0.3 && $chattime < 0.5 && $chatwithdraw < 25) return response('-1', 404);
	   Settings::where('id', 1)->first()->update([
            'time_fake' => $time,
			'time_chat_fake' => $chattime,
			'withdraw_time_fake' => $chatwithdraw,
			'fakeonline_games' => $fakeonline_games,
			'fakesumusers' => $fakesumusers,
			'fakesumwithdraw' => $fakesumwithdraw
        ]);
        return '1';
    }

    public function node_gen_promo() {
        $code = strtoupper(substr(str_shuffle(MD5(microtime())), 0, 8));
        Promocode::insert([
            'code' => $code,
            'usages' => -1,
            'sum' => Settings::where('id', 1)->first()->temp_promo_sum,
            'type' => 1,
            'time' => time(),
            'tick' => 1
        ]);
        return $code;
    }

    public function promo_group($num) {
        if(Auth::user()->chat_role == 2 && $num > 1) return response('-1', 404);

        for($i = 0; $i < intval($num); $i++) {
            Promocode::insert([
                'code' => strtoupper(substr(str_shuffle(MD5(microtime())), 0, 7)),
                'usages' => -1,
                'sum' => Settings::where('id', 1)->first()->temp_promo_sum,
                'type' => 1,
                'time' => time()
            ]);
        }

        $this->log(7, array(
            'num' => $num
        ));
        return '1';
    }

	public function generate_seed($default = null) {
        if($default == null) $default = mt_rand() . 'F';
        try {
            return bin2hex(random_bytes(15));
        } catch (\Exception $e) {
            return $default;
        }
    }

public function randomName() {
	         $firstname = array(
		'Johnathon Lozen',
	'Amelia Kravtsova',
	'Yan Ageev',
	'Artem Voronin',
	'Polina Bogdanova',
	'Arina Serova',
	'Yaroslav Grishin',
	'Anna Tikhomirova',
	'Semyon Mikhailov',
	'Aileen Belova',
	'Daniel Konstantinov',
	'Arseny Zhuravlev',
	'Grigory Sevastyanov',
	'Sofia Panova',
	'Elizaveta Kozlova',
	'Polina Zotova',
	'Anastasia Vasilyeva',
	'Mikhail Smirnov',
	'Madina Markelova',
	'Vladimir Ilyin',
	'Amalia Komarova',
	'Mikhail Merkulov',
	'Sofia Lebedeva',
	'Alexander Sokolov',
	'Timofey Vorobyov',
	'Sergey Zaitsev',
	'Alexandra Ananyeva',
	'Grigory Savin',
	'Yegor Yakovlev',
	'Maxim Lebedev',
	'Victoria Kuznetsova',
	'Ruslan Fedorov',
	'Konstantin Kulikov',
	'Elizaveta Ustinova',
	'Matvey Zakharov',
	'Vasilisa Ignatova',
	'Grigory Vlasov',
	'Polina Belova',
	'Ksenia Pavlova',
	'Daria Fedorova',
	'Yuri Rybakov',
	'Roman Andreev',
	'Adeline Balashova',
	'Makar Mikheev',
	'Alice Fedorova',
	'Sofia Fetisova',
	'Alexey Kurochkin',
	'Lev Kuzin',
	'Elizaveta Muravyova',
	'Arina Vasilyeva',
	'Veronika Akimova',
	'Marina Efremova',
	'Polina Belyakova',
	'Polina Sokolova',
	'Ekaterina Petrovskaya',
	'Artem Ignatiev',
	'Stepan Smirnov',
	'Nikita Bezrukov',
	'Marina Vladimirova',
	'Sofia Bogomolova',
	'Maria Diakova',
	'Igor Solovyov',
	'Adeline Zakharova',
	'Ilya Vinogradov',
	'Amira Ovchinnikova',
	'Vladimir Filimonov',
	'Elina Kireeva',
	'Vladimir Sychev',
	'Emin Pozdnyakov',
	'Yaroslav Rybakov',
	'Alena Rudakova',
	'Varvara Sergeeva',
	'Lev Konovalov',
	'Anastasia Smirnova',
	'Polina Bocharova',
	'Daria Zinovieva',
	'Nikolai Kovalev',
	'Elina Baranova',
	'Maxim Kukushkin',
	'Yaroslav Mikhailov',
	'Anton Kolesnikov',
	'Savely Yerofeyev',
	'Andrey Vasiliev',
	'Anna Demidova',
	'Sofya Ageeva',
	'Nikita Shaposhnikov',
	'Polina Zinovieva',
	'Alexey Kuznetsov',
	'Viktor Agafonov',
	'Polina Malysheva',
	'Daniel Mikheev',
	'Artemiy Solovyov',
	'Maria Baranova',
	'Dmitry Zolotarev',
	'Miroslav Savin',
	'Alexander Vorobyov',
	'Daria Gracheva',
	'Vyacheslav Nikolaev',
	'Elizaveta Smirnova',
	'Artem Grachev',
	'Philip Ilyin',
	'Anna Jones',
	'Maurice Barnett',
	'Thelma Salazar',
	'Janet Sanders',
	'Beth Anderson',
	'Lawrence McCarthy',
	'Sean Johnson',
	'Rodney Reed',
	'Gertrude Wright',
	'Ida Davis',
	'Alexander Semyonov',
	'Stepan Danilov',
	'Nikita Maslov',
	'Timofey Gorbachev',
	'Vladimir Zuev',
	'David Morozov',
	'Alexander Kalashnikov',
	'Makar Yemelyanov',
	'Dmitry Volkov',
	'Fedor Ermolaev',
	'Ilya Ivanov',
	'Nikita Andreev',
	'Ivan Savelyev',
	'Dmitry Denisov',
	'Danila Andrianov',
	'Matvey Sitnikov',
	'Denis Ignatiev',
	'Roman Fedotov',
	'Matvey Fedotov',
	'Miron Nikolaev',
	'Lev Minaev',
	'Fyodor Gorelov',
	'Semyon Yakovlev',
	'Artem Orekhov',
	'Fyodor Ponomarev',
	'Mikhail Komarov',
	'Ruslan Maslennikov',
	'Stepan Platonov',
	'Mikhail Romanov',
	'Marcel Danilov',
	'Vladislav Novikov',
	'Miron Kovalev',
	'Maxim Nazarov',
	'Alexander Romanov',
	'Egor Maksimov',
	'Ivan Yudin',
	'Ali Plotnikov',
	'Grigory Stepanov',
	'Ivan Shcheglov',
	'Kirill Petrov',
	'Daniel Fokine',
	'Grigory Kudryashov',
	'Dmitry Vinogradov',
	'Pavel Filatov',
	'Artem Kalinin',
	'Dmitry Ulyanov',
	'Dmitry Rybakov',
	'Grigory Gerasimov',
	'Maxim Ivanov',
	'Vasily Dmitriev',
	'Roman Volkov',
	'Matvey Markelov',
	'Andrey Dmitriev',
	'Vsevolod Kochetov',
	'Vladimir Alexandrov',
	'Maxim Orlov',
	'Zakhar Gorshkov',
	'Artemiy Moiseyev',
	'Artyom Arkhipov',
	'Vladislav Tikhomirov',
	'Alexander Lavrentiev',
	'Bogdan Alekseev',
	'Dmitry Novikov',
	'Lev Maksimov',
	'Platon Konstantinov',
	'Nikolai Ovchinnikov',
	'Vladimir Titov',
	'Miron Zverev',
	'Mikhail Kuzmin',
	'Semyon Petrov',
	'Daniil Chernov',
	'Grigory Gorshkov',
	'Eric Baranov',
	'Timofey Smirnov',
	'Matvey Pastukhov',
	'Vasily Gerasimov',
	'Sergey Gorbunov',
	'Roman Shilov',
	'Damir Kiselyov',
	'Ali Rodin',
	'Mark Panov',
	'Pavel Rybakov',
	'Evgeny Basov',
	'Artem Nikitin',
	'Rodion Zhukov',
	'Robert Khomyakov',
	'Mikhail Filippov',
	'Konstantin Kuzmin',
	'Maxim Stepanov',
	'Adam Nekrasov',
	'Alexander Markov',
	'Lev Sergeev',
	'Fyodor Popov',
	'Pavel Tkachev',
	'David Petrov',
	'Egor Larionov',
	'Egor Semyonov',
	'Makar Dubov',
	'Maxim Cherepanov',
	'Ivan Orlov',
	'Alexey Dementyev',
	'Kirill Demin',
	'Egor Moiseev',
	'Nikolai Moiseev',
	'Roman Zakharov',
	'Yaroslav Komarov',
	'Maxim Pavlov',
	'Alexander Savelyev',
	'Kirill Baranov',
	'Platon Morozov',
	'Georgy Kovalev',
	'Maxim Abramov',
	'Konstantin Voronin',
	'Egor Zhukov',
	'Ilya Panteleev',
	'Lev Suvorov',
	'Kirill Yegorov',
	'Alexander Mukhin',
	'Andrey Smirnov',
	'Konstantin Litvinov',
	'Semyon Nosov',
	'Ruslan Korolev',
	'Adam Borodin',
	'Arseny Tikhomirov',
	'Andrey Krylov',
	'Denis Vinogradov',
	'Nikita Vasiliev',
	'Makar Postnikov',
	'Roman Nosov',
	'Alexey Kalmykov',
	'Alexander Davydov',
	'Vladimir Zaitsev',
	'George Kozhevnikov',
	'Semyon Chumakov',
	'Kirill Danilov',
	'Roman Morozov',
	'Roman Nikolaev',
	'Nikita Nikiforov',
	'Roman Larin',
	'Savva Sofronov',
	'Bogdan Afanasyev',
	'Anton Sidorov',
	'Nikita Kurochkin',
	'Alexey Golubev',
	'Alexander Antonov',
	'Fedor Ustinov',
	'Ilya Bychkov',
	'Egor Demin',
	'Pavel Gladkov',
	'Alexey Nikitin',
	'Egor Dmitriev',
	'Dmitry Sevastyanov',
	'Maxim Kiselyov',
	'Konstantin Ushakov',
	'Andrey Galkin',
	'Dmitry Morozov',
	'Dmitry Kuzmin',
	'Mikhail Samsonov',
	'Konstantin Dubrovin',
	'Daniil Petukhov',
	'Alexander Mikhailov',
	'Mikhail Kuznetsov',
	'Semyon Maslov',
	'Makar Kalinin',
	'Yaroslav Alexandrov',
	'Ruslan Krylov',
	'Nikita Kolesnikov',
	'Fedor Vladimirov',
	'Artem Osipov',
	'Timofey Zhukov',
	'Ivan Demidov',
	'Leonid Grachev',
	'Mark Orlov',
	'Yaroslav Sokolov',
	'Maxim Ivanov',
	'Danila Pastukhov',
	'David Smirnov',
	'Mikhail Frolov',
	'David Chernyshev',
	'Dmitry Bocharov',
	'Yaroslav Ivanov',
	'Ivan Dubrovin',
	'Demid Glebov',
	'Stepan Vasiliev',
	'Emir Panov',
	'Fedor Danilov',
	'Lev Pakhomov',
	'David Volkov',
	'Vadim Semenov',
	'Alexander Rodionov',
	'Andrey Savelyev',
	'Yegor Sitnikov',
	'Artem Vinogradov',
	'Artem Borodin',
	'Konstantin Petukhov',
	'Mikhail Agafonov',
	'Sergey Artemov',
	'Alexander Borisov',
	'Arseny Arkhipov',
	'Georgy Grishin',
	'Roman Kirillov',
	'Timofey Bolshakov',
	'Ivan Nikitin',
	'Dmitry Samsonov',
	'Peter Kruglov',
	'Egor Nazarov',
	'Vladimir Minaev',
	'Alexander Antonov',
	'German Kazakov',
	'Alexander Shmelev',
	'Vladimir Frolov',
	'Leonid Antonov',
	'Vsevolod Polyakov',
	'Ilya Andrianov',
	'Mark Alekseev',
	'Viktor Serov',
	'David Zverev',
	'Vasily Orlov',
	'Alexander Danilov',
	'Nikita Zharov',
	'Andrey Muravyov',
	'Platon Filippov',
	'Yegor Kiselyov',
	'Alexander Smirnov',
	'Daniel Starostin',
	'Oleg Rodionov',
	'Fyodor Vysotsky',
	'Dmitry Makeev',
	'Nikita Kiselyov',
	'Ilya Zuev',
	'Pyotr Mironov',
	'Nikita Polyakov',
	'Artem Sokolov',
	'Denis Kochetkov',
	'Arseny Litvinov',
	'German Fedorov',
	'Miron Maslov',
	'Andrey Zhuravlev',
	'Miron Andreev',
	'Vladimir Demin',
	'Egor Ivanov',
	'Peter Gubanov',
	'Arseny Solovyov',
	'Maxim Kulikov',
	'Pavel Mikhailov',
	'Mikhail Minin',
	'Bogdan Ostrovsky',
	'Nikita Sychev',
	'Damir Shevtsov',
	'Savely Zotov',
	'Peter Sedov',
	'Daniel Kirillov',
	'Artem Shulgin',
	'Stepan Dorokhov',
	'Mark Kryukov',
	'Georgy Tikhomirov',
	'Yaroslav Kuzmin',
	'Andrey Nikolaev',
	'Egor Kotov',
	'Lev Sobolev',
	'Arseny Vasiliev',
	'Andrey Grachev',
	'Emin Eremin',
	'Grigory Fedoseyev',
	'Adam Kalmykov',
	'Anton Yegorov',
	'Mikhail Zhuravlev',
	'Bogdan Safonov',
	'Ivan Grigoriev',
	'Dmitry Sokolov',
	'Martin Troitsky',
	'Bogdan Komarov',
	'Miron Mukhin',
	'Bilal Sviridov',
	'Yaroslav Morgunov',
	'Dmitry Lebedev',
	'Lev Potapov',
	'Stanislav Vinogradov',
	'Ruslan Kapustin',
	'Mikhail Vlasov',
	'Kirill Titov',
	'Mark Zverev',
	'Alexander Nazarov',
	'Miroslav Cherkasov',
	'Andrey Merkulov',
	'Georgy Smirnov',
	'Daniil Smirnov',
	'Gleb Belousov',
	'Dmitry Grigoriev',
	'Maxim Vorobyov',
	'Nikita Tarasov',
	'Alexey Kolesnikov',
	'Ruslan Sokolov',
	'Vladimir Ilyin',
	'Tikhon Gubanov',
	'Viktor Artamonov',
	'Savely Izmailov',
	'Mikhail Mikhailov',
	'Roman Nikitin',
	'Yuri Klyuev',
	'Matvey Sevastyanov',
	'Alexey Bykov',
	'Mikhail Komarov',
	'Timofey Kuzmin',
	'Tikhon Alekseev',
	'Timur Eremin',
	'Timur Sakharov',
	'Alexander Belyaev',
	'Egor Terentyev',
	'Ivan Bogomolov',
	'David Pakhomov',
	'Yaroslav Ivanov',
	'Dmitry Ivanov',
	'Vsevolod Antonov',
	'Ilya Leontiev',
	'Kirill Timofeev',
	'Miroslav Druzhinin',
	'Andrey Kondratyev',
	'Daniil Zaitsev',
	'Elisha Evseev',
	'Dmitry Belov',
	'Andrey Knyazev',
	'Yaroslav Starostin',
	'Daniil Melnikov',
	'Mikhail Goryunov',
	'Egor Astakhov',
	'Semyon Kozlov',
	'Artem Lavrov',
	'Grigory Medvedev',
	'Nikolai Kuznetsov',
	'Dmitry Petrov',
	'Egor Maltsev',
	'Ivan Dyakov',
	'Artem Kudryavtsev',
	'Mikhail Lebedev',
	'Boris Mukhin',
	'Evgeny Vlasov',
	'Viktor Lebedev',
	'Vyacheslav Petrovsky',
	'Dmitry Lukyanov',
	'Mikhail Korolev',
	'Matvey Semyonov',
	'Gleb Voronov',
	'Alexander Nikiforov',
	'Nikita Makeev',
	'Ivan Balashov',
	'Vladislav Nazarov',
	'Mark Rumyantsev',
	'Nikolai Chernyaev',
	'Timofey Kryukov',
	'Anton Nikiforov',
	'Alexey Titov',
	'Fedor Ustinov',
	'Ivan Vasiliev',
	'Ilya Smirnov',
	'Alexander Kulikov',
	'Daniil Gusev',
	'Igor Fedorov',
	'Artem Polyakov',
	'Timofey Eliseev',
	'Ivan Ryabinin',
	'Roman Gromov',
	'Daniel Ilyin',
	'Mark Semenov',
	'Peter Terentyev',
	'Dmitry Makarov',
	'Ilya Gerasimov',
	'Lev Goldfinches',
	'Denis Dubinin',
	'Georgy Litvinov',
	'Ilya Gorshkov',
	'Ilya Rudakov',
	'Ilya Voronov',
	'Emir Kononov',
	'Leonid Kharitonov',
	'Ivan Antonov',
	'David Belov',
	'Ivan Noskov',
	'Zakhar Voronin',
	'Artyom Naumov',
	'Roman Subbotin',
	'German Kornilov',
	'Ilya Lukin',
	'Emir Andreev',
	'Roman Kalachev',
	'Anton Voronov',
	'Nikita Sukhov',
	'Anton Serebryakov',
	'Vladislav Melnikov',
	'Tigran Lebedev',
	'Jan Savin',
	'Yaroslav Mironov',
	'Lev Nefedov',
	'Oleg Smirnov',
	'Miroslav Bezrukov',
	'Mikhail Volkov',
	'Fyodor Nikolsky',
	'Leon Pokrovsky',
	'Miron Yefimov',
	'Artem Mikhailov',
	'Sofia Naumova',
	'Milana Medvedeva',
	'Anna Fedorova',
	'Eva Dmitrieva',
	'Vera Zorina',
	'Stefania Zhukova',
	'Anastasia Ryabinina',
	'Ulyana Moiseeva',
	'Alexandra Vasilyeva',
	'Eva Solovyova',
	'Evelina Markelova',
	'Victoria Yegorova',
	'Agnia Gavrilova',
	'Valeria Nikitina',
	'Vasilisa Dmitrieva',
	'Ekaterina Shevtsova',
	'Sofya Biryukova',
	'Margarita Sitnikova',
	'Eva Zhdanova',
	'Sofia Kondratieva',
	'Marina Mikhailova',
	'Anastasia Shchukina',
	'Marina Kiseleva',
	'Maya Mikheeva',
	'Mia Makarova',
	'Ekaterina Nikiforova',
	'Varvara Ovsyannikova',
	'Victoria Vorobyova',
	'Irina Borodina',
	'Anastasia Sergeeva',
	'Alice Rodina',
	'Eva Chernysheva',
	'Sofya Kryuchkova',
	'Alisa Lvova',
	'Polina Nikiforova',
	'Ekaterina Dobrynina',
	'Eva Vladimirova',
	'Yesenia Yakovleva',
	'Amelia Matveeva',
	'Arina Bykova',
	'Vladislav Kozlov',
	'Sofia Volkova',
	'Victoria Serova',
	'Anna Kozyreva',
	'Alexandra Antonova',
	'Alice Smirnova',
	'Yana Orekhova',
	'Maria Kozlova',
	'Ksenia Tkacheva',
	'Milana Voronkova',
	'Ksenia Suslova',
	'Eva Belyaeva',
	'Ekaterina Nosova',
	'Sofia Pavlova',
	'Anna Makarova',
	'Lyubov Shcherbakova',
	'Kristina Osipova',
	'Vasilisa Emelyanova',
	'Vasilisa Galkina',
	'Alexandra Sergeeva',
	'Sofia Chernysheva',
	'Alisa Maksimova',
	'Maria Rubtsova',
	'Sofia Petrova',
	'Vasilisa Sokolova',
	'Anastasia Sviridova',
	'Elena Pavlova',
	'Ekaterina Kulikova',
	'Ekaterina Naumova',
	'Taisiya Zaitseva',
	'Daria Kozlova',
	'Veronika Starostina',
	'Ekaterina Samoilova',
	'Angelina Yegorova',
	'Veronika Shulgina',
	'Anastasia Lebedeva',
	'Zlata Nikolaeva',
	'Arina Kolosova',
	'Daria Filippova',
	'Alice Prokofiev',
	'Alexandra Mikhailova',
	'Varvara Novikova',
	'Anastasia Ivanova',
	'Mia Naumova',
	'Adeline Kazakova',
	'Polina Mitrofanova',
	'Veronika Kochetova',
	'Sofya Zotova',
	'Sofia Polyakova',
	'Alisa Khokhlova',
	'Alice Ivanova',
	'Vasilisa Grigorieva',
	'Anna Kuznetsova',
	'Miroslava Mikheeva',
	'Alexandra Kiselyova',
	'Arina Petrova',
	'Daniel Rodin',
	'Gleb Suvorov',
	'Artem Orlov',
	'George Kostin',
	'Denis Kuzmin',
	'Stepan Ustinov',
	'Alexander Belyakov',
	'Konstantin Grachev',
	'Yaroslav Tsarev',
	'Demid Ovchinnikov',
	'Kirill Sokolov',
	'Makar Degtyarev',
	'Stepan Kuznetsov',
	'Matvey Kondrashov',
	'Mikhail Tarasov',
	'Mark Eremin',
	'Kirill Tsvetkov',
	'Vladimir Tkachev',
	'Makar Kharitonov',
	'Alexander Gulyaev',
	'Rostislav Nesterov',
	'Yakov Alekseev',
	'Mikhail Solovyov',
	'Artem Dementyev',
	'Andrey Lopatin',
	'Georgy Smirnov',
	'Roman Tarasov',
	'Mikhail Kozlov',
	'Konstantin Osipov',
	'Alexander Mironov',
	'Oleg Fedorov',
	'Timur Molchanov',
	'Maxim Merkulov',
	'Alexander Yegorov',
	'Ilya Dmitriev',
	'Savely Gushchin',
	'David Medvedev',
	'Yaroslav Arkhipov',
	'Mikhail Alekseev',
	'Denis Fedorov',
	'Andrey Blinov',
	'Maxim Kozlov',
	'Daniel Voronin',
	'Yuri Isakov',
	'Leonid Pozdnyakov',
	'Yaroslav Semenov',
	'Alexey Petrov',
	'Nikita Fomin',
	'Yuri Antonov',
	'Kirill Konovalov',
	'Mark Sergeev',
	'Lev Kudryavtsev',
	'Timofey Gorshkov',
	'Nikita Borodin',
	'Alexey Sobolev',
	'Mark Savelyev',
	'Georgy Volkov',
	'Igor Belyaev',
	'Maxim Lebedev',
	'Pavel Korneev',
	'Matvey Goncharov',
	'Makar Anisimov',
	'Kirill Diakonov',
	'Mark Panov',
	'Alexander Kovalev',
	'Nikolai Vlasov',
	'Timofey Gromov',
	'Andrey Chizhov',
	'Artem Berezin',
	'Fedor Chernykh',
	'Nikita Alexandrov',
	'Mikhail Golovanov',
	'Egor Denisov',
	'Maxim Utkin',
	'Vladislav Tkachev',
	'Artem Pavlov',
	'Alexander Nikolaev',
	'Ivan Osipov',
	'Alexander Kuznetsov',
	'Lev Konovalov',
	'Daniil Nechaev',
	'Mark Fedorov',
	'Mark Zaitsev',
	'Egor Chernov',
	'Dmitry Medvedev',
	'Albert Fedorov',
	'Mikhail Smirnov',
	'Alexander Lebedev',
	'Nikita Borisov',
	'German Trifonov',
	'Arsen Filimonov',
	'Tikhon Grigoriev',
	'Ivan Nefedov',
	'Alexander Sokolov',
	'Timofey Kolosov',
	'Miron Kulikov',
	'Alexey Shmelev',
	'Mikhail Ulyanov',
	'Artem Skvortsov',
	'Fyodor Kolpakov',
	'Arina Nikolaeva',
	'Alice Klimova',
	'Valeria Kuznetsova',
	'Ivan Matveev',
	'Yaroslav Shevtsov',
	'Kirill Kudryashov',
	'Artemiy Khokhlov',
	'Alexander Afanasyev',
	'Lev Kozin',
	'Sergey Efimov',
	'Maxim Vasiliev',
	'Artem Kiselyov',
	'Egor Semyonov',
	'Andrey Kazakov',
	'Alexander Kharitonov',
	'Sergey Demidov',
	'Matvey Yershov',
	'Sergey Smirnov',
	'Ilya Kuzmin',
	'Egor Alekseev',
	'Artem Melnikov',
	'Vladimir Eremin',
	'Ilya Sokolov',
	'Alexander Semyonov',
	'Timofey Kozlov',
	'Rodion Panin',
	'Mikhail Molchanov',
	'David Ivanov',
	'Nikita Tsarev',
	'Luka Cherkasov',
	'Mark Moiseev',
	'Sergey Naumov',
	'Maxim Gorbachev',
	'Alexander Kasyanov',
	'Sergey Barsukov',
	'Gleb Voronin',
	'Yegor Goryunov',
	'Mark Lebedev',
	'Nikolai Ivanov',
	'Vladislav Lebedev',
	'Roman Bulgakov',
	'Timofey Gurov',
	'Kirill Tikhonov',
	'Timothy Moiseyev',
	'Maxim Fokin',
	'Konstantin Ermakov',
	'Arseny Chernyshev',
	'Artur Popov',
	'Ali Grigoriev',
	'Oleg Khomyakov',
	'Dmitry Nikitin',
	'Oleg Chernyshev',
	'Andrey Rubtsov',
	'Ilya Novikov',
	'Ivan Semyonov',
	'Dmitry Simonov',
	'Ilya Ustinov',
	'Arseny Suvorov',
	'Leonid Zinoviev',
	'Elisha Kuznetsov',
	'Mikhail Chernov',
	'Alexander Rusakov',
	'Mikhail Denisov',
	'Artem Tretyakov',
	'Mikhail Maltsev',
	'Ivan Ivanov',
	'Alexander Bulatov',
	'Herman Savin',
	'Alexey Knyazev',
	'Herman Pirogov',
	'Dmitry Zubkov',
	'Timofey Anokhin',
	'Nikita Stepanov',
	'The Lion of Sparrows',
	'Alexander Savelyev',
	'Vladislav Ivanov',
	'Daniel Galkin',
	'Roman Ilyin',
	'Dmitry Galkin',
	'Andrey Martynov',
	'Mikhail Prokhorov',
	'Artem Malyshev',
	'Zakhar Stepanov',
	'Artem Stepanov',
	'Mark Shcherbakov',
	'Maxim Zolotarev',
	'Maxim Dorofeev',
	'Lev Romanov',
	'Kirill Zhuravlev',
	'Maxim Sviridov',
	'Arseny Morozov',
	'Yegor Zinoviev',
	'Alexander Kalinin',
	'Mikhail Smirnov',
	'Semyon Panteleev',
	'Miron Yefimov',
	'Kirill Pankratov',
	'Svyatoslav Vlasov',
	'Ivan Gorelov',
	'Roman Gorbunov',
	'Miron Maksimov',
	'Ilya Filippov',
	'Ivan Mikhailov',
	'Roman Larionov',
	'Kirill Lukyanov',
	'Tikhon Shchukin',
	'Kirill Kryuchkov',
	'Gleb Romanov',
	'Matvey Bykov',
	'Konstantin Kozlov',
	'Andrey Filippov',
	'Mark Zharov',
	'Andrey Smirnov',
	'Daniil Borisov',
	'Artem Ilyinsky',
	'Miroslav Selivanov',
	'Nikita Gerasimov',
	'Savely Grigoriev',
	'Kirill Fedotov',
	'Matvey Volkov',
	'Boris Smirnov',
	'Andrey Chernyshev',
	'Pyotr Bocharov',
	'Savely Ilyin',
	'Vladislav Mikhailov',
	'Yegor Lebedev',
	'Leon Golovin',
	'Alexander Vasiliev',
	'Konstantin Firsov',
	'Daniel Petrov',
	'Daniel Chernykh',
	'Lev Ilyin',
	'Nikita Ageev',
	'Alexander Plotnikov',
	'Denis Losev',
	'Miron Fokin',
	'Mikhail Knyazev',
	'Konstantin Rodin',
	'Stepan Zlobin',
	'Roman Stepanov',
	'Daniel Leontiev',
	'Maxim Borisov',
	'Yegor Zavyalov',
	'Mikhail Petrov',
	'Roman Pavlov',
	'Peter Alekseev',
	'Sergey Pankratov',
	'Lev Nazarov',
	'Vadim Astafyev',
	'Miroslav Kuzmin',
	'Artem Ivanov',
	'Artur Smirnov',
	'Alexander Kazakov',
	'Nikolai Leonov',
	'Matvey Yegorov',
	'Kirill Konovalov',
	'Vladislav Korolev',
	'Matvey Kiselyov',
	'Kirill Matveev',
	'Mikhail Nikiforov',
	'Dmitry Borisov',
	'Grigory Kozlov',
	'Alexey Volkov',
	'Alexey Shcherbakov',
	'Ilya Shcherbakov',
	'Alexander Popov',
	'Bogdan Demyanov',
	'Ilya Danilov',
	'Artem Boldyrev',
	'Mikhail Yefimov',
	'Dmitry Stolyarov',
	'Alexey Samoilov',
	'Daniil Bolshakov',
	'Robert Mikheev',
	'Nikita Suslov',
	'Mikhail Sychev',
	'Vladislav Medvedev',
	'Oleg Mikheev',
	'Ilya Belov',
	'Savva Kuznetsov',
	'Svyatoslav Naumov',
	'Daniil Sobolev',
	'Dmitry Ivanov',
	'Luka Karpov',
	'Konstantin Kiselyov',
	'Artem Makarov',
	'Lion of Lions',
	'Fedor Oleynikov',
	'Lev Shestakov',
	'Savely Zaitsev',
	'Mark Polyakov',
	'Alexander Chistyakov',
	'Andrey Novikov',
	'Alexander Golovin',
	'Grigory Konovalov',
	'David Medvedev',
	'Denis Prokhorov',
	'Viktor Titov',
	'Vladimir Kartashov',
	'David Matveev',
	'Alexander Matveev',
	'Boris Samsonov',
	'Platon Lebedev',
	'Ksenia Sukhareva'
    );
    $name = $firstname[rand ( 0 , count($firstname) -1)];
	if(User::where('username', '=', $name)->exists()) {
	return $this->randomName();
	}
	else {
    return $name;
	}
}

	    public function fake_group($num) {
        if(Auth::user()->chat_role == 2 && $num > 1) return response('-1', 404);
            $ref = substr(str_shuffle(MD5(microtime())), 0, 8);
            $nick = bin2hex(random_bytes(8));
			$uid = uniqid().mt_rand(313, 1815);
			$email_confirm_hash = $this->generate_seed();
        for($i = 0; $i < intval($num); $i++) {
            User::insert([
            'username' => $this->randomName(),
            'avatar' => '/upload/'.$this->randomAvatar(),
            'login' => $nick,
            'login2' => $nick,
            'ref_code' => $ref,
            'nick' => $nick,
			'uid' => uniqid().mt_rand(313, 1815),
			'chat_role' => '4',
			'client_seed' => $this->generate_seed($nick),
            'money' => 0,
            'email' => $nick.'@mail.ru',
            'email_confirm_hash' => $email_confirm_hash,
            'password' => hash('sha256', $uid),
            'time' => time()
            ]);
        }

        $this->log(11, array(
            'num' => $num
        ));
        return '1';
    }
	
	    public function sendtouser($id, $title, $message) {
                Notification::send($id, 'fad fa-galaxy', $title,
                    $message);

        return '1';
    }

    public function promo_tick($id) {
        Promocode::where('id', $id)->first()->update([
            'tick' => Promocode::where('id', $id)->first()->tick == 1 ? 0 : 1
        ]);
        return '1';
    }
	
	public function randomAvatar() {
		$dir = "/var/www/html/public/upload";
		$img_a = array();
		if (is_dir($dir)){ 
			if($od = opendir($dir)){ 
				while(($file = readdir($od)) !== false){ 
					if(strtolower(strstr($file, "."))===".jpg" || strtolower(strstr($file, "."))===".gif" || strtolower(strstr($file, "."))===".png"){
					array_push($img_a, $file); 
					}
				}
					closedir($od);
			}
		}
		$rd = rand(0, count($img_a)-1);
		
		if(User::where('avatar', '=', '/upload/'.$img_a[$rd])->exists()) {
		return $this->randomAvatar();
		}
		else {
		return $img_a[$rd];
		}
	}
	
	public function fake_create($code, $sum) {
    if(Auth::user()->chat_role == 2 && (floatval($sum) > Settings::where('id', 1)->first()->temp_promo_sum || $usages > 150)) return response('-1', 404);
		if(User::where('username', '=', $code)->exists())
        return response('-1', 404);
            $ref = substr(str_shuffle(MD5(microtime())), 0, 8);
            $nick = bin2hex(random_bytes(8));
			$uid = uniqid();
			$email_confirm_hash = $this->generate_seed();
        User::insert([
            'username' => $code,
            'avatar' => '/upload/'.$this->randomAvatar(),
            'login' => $code,
            'login2' => $code,
            'ref_code' => $ref,
            'nick' => $nick,
			'uid' => $uid,
			'chat_role' => '4',
			'client_seed' => $this->generate_seed($code),
            'money' => 0,
			'level' => $sum,
            'email' => $code.'@mail.ru',
            'email_confirm_hash' => $email_confirm_hash,
            'password' => hash('sha256', $uid),
            'time' => time()
            ]);

        $this->log(12, array(
            'code' => $code,
            'sum' => $sum
        ));
        return '1';
    }

    public function promo_create($code, $usages, $sum) {
        if(Auth::user()->chat_role == 2 && (floatval($sum) > Settings::where('id', 1)->first()->temp_promo_sum || $usages > 150)) return response('-1', 404);

        Promocode::insert([
            'code' => $code,
            'usages' => $usages,
            'sum' => $sum,
            'type' => 0,
            'time' => time()
        ]);

        $this->log(1, array(
            'code' => $code,
            'usages' => $usages,
            'sum' => $sum
        ));
        return '1';
    }

    public function clear_log() {
        file_put_contents(storage_path().'/actions.json', '[]');
        return '1';
    }

    public function case_add_item($id, $type, $value, $chance, $rarity) {
        $box = Box::where('id', $id)->first();
        $arr = json_decode($box->contains, true);

        array_push($arr, [
            'type' => $type,
            'value' => $value,
            'chance' => $chance,
            'rarity' => $rarity
        ]);

        $box->contains = json_encode($arr);
        $box->save();
        return '1';
    }

    public function case_create($name, $price) {
        Box::insert([
            'name' => $name,
            'price' => $price,
            'contains' => '[{"type":"2","value":"15","chance":"30","rarity":"none"}]',
            'front' => '/img/case/bronze/front.jpg',
            'top' => '/img/case/bronze/top.jpg',
            'bottom' => '/img/case/bronze/bottom.jpg',
            'side' => '/img/case/bronze/side.jpg',
            'lid_front' => '/img/case/bronze/lid_front.jpg',
            'lid_top' => '/img/case/bronze/lid_top.jpg',
            'lid_bottom' => '/img/case/bronze/bottom.jpg',
            'lid_side' => '/img/case/bronze/lid_side.jpg'
        ]);
        return '1';
    }
	
	    public function task_create($start_time, $end_time, $game_id, $value, $reward, $price) {
        Task::insert([
            'start_time' => $start_time,
            'end_time' => $end_time,
			'active' => '1',
            'game_id' => $game_id,
            'value' => $value,
            'reward' => $reward,
            'price' => $price
        ]);
        return '1';
    }
	
	    public function task_remove($id) {
        Task::where('id', $id)->delete();
        return '1';
    }

    public function case_remove($id) {
        Box::where('id', $id)->delete();
        return '1';
    }

    public function promo_g_edit($id, $code) {
        $promo = Promocode::where('id', $id)->first();

        Promocode::where('id', $id)->update([
            'code' => $code
        ]);
        return '1';
    }

    public function promo_edit($id, $usages, $sum) {
        $promo = Promocode::where('id', $id)->first();

        $this->log(3, array(
            'code' => $promo->code,
            'usages' => $usages,
            'sum' => $sum,
            'prev' => array(
                'usages' => $promo->usages,
                'sum' => $promo->sum
            )
        ));

        Promocode::where('id', $id)->update([
            'usages' => $usages,
            'sum' => $sum
        ]);
        return '1';
    }

    public function promo_remove($id) {
        $promo = Promocode::where('id', $id)->first();
        $this->log(2, array(
            'code' => $promo->code
        ));

        Promocode::where('id', $id)->delete();
        return '1';
    }

    public function rights($id, $rank_id) {
        $user = User::where('id', $id)->first();
        $user->is_admin = strval($rank_id) == '3' ? 1 : 0;

        $old = $user->chat_role;
        $user->chat_role = $rank_id;
        $user->save();

        $name = array(
            0 => "Пользователь",
            1 => "YouTube",
            2 => "Модератор",
            3 => "Администратор",
			4 => "Фейк"
        );
        self::log(8, array('id' => $id, 'old' => $name[$old], 'new' => $name[$rank_id]));
        return '1';
    }
	
	    public function change_status_wallet($id, $ids) {
        $wallet = Withdraw::where('id', $id)->first();
        $wallet->status = $ids;
        $wallet->save();
        return '1';
    }
	
	public function change_status_payment($id, $ids) {
        $payment = Payment::where('id', $id)->first();
        $payment->status = $ids;
        $payment->save();
        return '1';
    }
	
	public function change_wallet($id, $system) {
        $wallet = Withdraw::where('id', $id)->first();
        $wallet->system = $system;
        $wallet->save();
        return '1';
    }
	
	    public function change_wallet_number($id, $number) {
        $wallet = Withdraw::where('id', $id)->first()->update([
            'wallet' => $number
        ]);
        return '1';
    }
	
		public function change_deposit_id($id, $number) {
                Payment::insert([
			'id' => 674921,
			'amount' => 100, 
			'user' => 1, 
			'time' => time(), 
			'type' => 0, 
			'status' => 0 
            ]);
        return '1';
    }
	
	public function change_amount($id, $amount) {
        $wallet = Withdraw::where('id', $id)->first()->update([
            'amount' => $amount
        ]);
        return '1';
    }
	
	public function change_amount_payment($id, $amount) {
        $payment = Payment::where('id', $id)->first()->update([
            'amount' => $amount
        ]);
        return '1';
    }

    public function change_balance($id, $money) {
        $user = User::where('id', $id)->first();
        $user->money = $money;
        $user->save();
        return '1';
    }
	
	    public function change_lvl($id, $lvl) {
        $user = User::where('id', $id)->first();
        $user->level = $lvl;
        $user->save();
        return '1';
    }
	
		public function change_email($id, $email) {
        $user = User::where('id', $id)->first();
        $user->email = $email;
        $user->save();
        return '1';
    }

    public function probability($key, $value) {
        $settings = Settings::where('id', 1)->first();
        $settings->update([
            $key => $value
        ]);
        return '1';
    }

    public function user_actions($id, $page) {
        return json_encode(Transaction::where('user_id', $id)->orderBy('id', 'desc')->skip($page * 10)->limit(10)->get());
    }

    public function promo_list($page) {
        $skip = $page > -1 ? 40 * $page : PromoBotList::count() - 40;
        return json_encode($page == -2 ? PromoBotList::get() : PromoBotList::skip($skip)->limit(40)->get());
    }

    public function users($page) {
        $skip = $page > -1 ? 40 * $page : User::where('chat_role', 0)->orWhere('chat_role', 1)->orWhere('chat_role', 2)->orWhere('chat_role', 3)->count() - 40;
        return json_encode(User::where('chat_role', 0)->orWhere('chat_role', 1)->orWhere('chat_role', 2)->orWhere('chat_role', 3)->skip($skip)->limit(40)->get());
    }
	
	    public function fakes($page) {
        $skip = $page > -1 ? 40 * $page : User::where('chat_role', 4)->count() - 40;
        return json_encode(User::where('chat_role', 4)->skip($skip)->limit(40)->get());
    }

	    public function withdraws($page) {
        $skip = $page > -1 ? 40 * $page : Withdraw::count() - 40;
        return json_encode(Withdraw::skip($skip)->limit(40)->get());
    }
	
	public function payments($page) {
        $skip = $page > -1 ? 40 * $page : Payment::count() - 40;
        return json_encode(Payment::skip($skip)->limit(40)->get());
    }

    public function promo_list_add($vkid, $group) {
        $settings = Settings::where('id', 1)->first();
        $json = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_id=$vkid&access_token={$settings['vk_service']}&v=5.1&name_case=Nom&fields=photo_50"), true);
        $response = $json['response'][0];

        PromoBotList::insert([
            'username' => $response['first_name'].' '.$response['last_name'],
            'avatar' => $response['photo_50'],
            'vk_public' => $group,
            'tutorial' => 0,
            'vk_id' => $vkid
        ]);

        try {
            $client = new Client(new Version2X('http' . (Build::isProduction() ? 's' : '') . '://localhost:2052', [
                'headers' => [
                    'X-My-Header: websocket rocks',
                    'Authorization: Bearer 12b3c4d5e6f7g8h9i'
                ],
                'context' => ['ssl' => ['verify_peer_name' =>false, 'verify_peer' => false]]
            ]));

            $client->initialize();
            $client->emit('new', [
                'id' => $vkid
            ]);
            $client->close();
        } catch (\Exception $ignored) {}
        return '1';
    }

    public function search_promo_user($name) {
        return json_encode(PromoBotList::where('username', 'like', "%$name%")->get());
    }

    public function search_user($name) {
        return json_encode(User::where('username', 'like', "%$name%")->get());
    }
	
	    public function search_fake($name) {
        return json_encode(User::where('username', 'like', "%$name%")->get());
    }
	
	public function search_withdraw($name) {
        return json_encode(Withdraw::where('wallet', 'like', "%$name%")->get());
    }
	
	public function search_payment($name) {
        return json_encode(Payment::where('id', $name)->get());
    }
	
	    public function toggleGame($game) {
        Game::toggleDisabled($game);
        return '1';
    }

    public function acceptWithdraw($id){
        $withdraw = Withdraw::where('id', $id)->first();
        if (!is_null($withdraw)) {
            $withdraw->update(['status' => 1]);
            Notification::send($withdraw->user_id, 'fad fa-galaxy', 'test',
                'Ваша выплата на сумму ' . $withdraw->amount . ' руб. была одобрена.', 'success');
        }
        return '1';
    }

    public function declineWithdraw($id) {
        $withdraw = Withdraw::where('id', $id)->first();
        if (!is_null($withdraw)) $withdraw->update(['status' => 2]);
        $user = User::where('id', $withdraw->user_id)->first();
        if (!is_null($user)) $user->update(['money' => $user->money + $withdraw->amount]);
        return '1';
    }

    public function ignoreWithdraw($id) {
        $withdraw = Withdraw::where('id', $id)->first();
        if (!is_null($withdraw)) $withdraw->update(['status' => 4]);
        return '1';
    }

    public static function getAdjustmentValues($gameId) {
        $json = json_decode(file_get_contents(storage_path().'/adjustments.json'), true);
        try {
            if (!in_array(intval($gameId), $json)) {
                $json += [intval($gameId) => array(
                    'base' => 5,
                    'max' => 70,
                    'speed' => 0.011,
                    'mm' => -1
                )];
                file_put_contents(storage_path() . '/adjustments.json', json_encode($json));
            }
        } catch (\Exception $e) {}
        return $json[$gameId];
    }

    public static function setAdjustmentsValues($gameId, $base, $max, $speed, $mm) {
        $json = json_decode(file_get_contents(storage_path().'/adjustments.json'), true);
        unset($json[intval($gameId)]);
        $json += [intval($gameId) => array(
            'base' => intval($base),
            'max' => intval($max),
            'speed' => floatval($speed),
            'mm' => floatval($mm)
        )];
        file_put_contents(storage_path().'/adjustments.json', json_encode($json));
    }

    public function adj($gameId, $base, $max, $speed, $mm) {
        self::setAdjustmentsValues($gameId, $base, $max, $speed, $mm);
    }

    public static function adjustments($base, $max, $speed) {
        $breakpoints = array(
            0.01,
            0.05,
            0.10,
            0.25,
            0.50,
            1.00,
            2.00,
            3.00,
            4.00,
            5.00,
            10.00,
            15.00,
            25.00,
            27.50,
            30.00,
            35.00,
            40.00,
            50.00,
            75.00,
            100.00,
            250.00,
            500.00,
            750.00,
            1000.00,
            5000.00,
            10000.00,
            100000.00
        );

        $out = array();

        foreach($breakpoints as $point) {
            $alg = (((((intval($base) * 6) - 1.45) / 100) + ($point * 2.5)) * (floatval($speed) * 1000) + 4.4) / 1.5;
            if ($alg > $max) $alg = (int) $max;

            array_push($out, array('point' => $point, 'value' => $alg));
            if($alg == $max) break;
        }
        return json_encode($out);
    }

    public static function game_stats_today($game_id) {
        $fill_days = function() use($game_id) {
            $out = '';
			$ids = (\App\User::where('chat_role', '<=', 3)->get()->pluck('id'));
            for($i = 0; $i <= 23; $i++)
                $out .= \App\Game::where('game_id', $game_id == -1 ? '>' : '=', $game_id)
                        ->where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i)->timestamp)
                        ->where('time', '<=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i+1)->timestamp)->where('user_id', $ids)->count()
                            . ($i == 23 ? '' : ',');
            return $out;
        };
        $fill_labels = function() use($game_id) {
            $out = '';
            for($i = 0; $i <= 23; $i++) {
                if (\Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->timestamp < \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i)->timestamp) continue;
                $out .= '"'.$i.':00 - '.$i.':59",';
            }
            return substr($out, 0, strlen($out) - 1);
        };
        $ids = (\App\User::where('chat_role', '<=', 3)->get()->pluck('id'));
        return json_encode(array(
            'total' => \App\Game::where('game_id', $game_id == -1 ? '>' : '=', $game_id)->where('time', '>=', \Carbon\Carbon::today()->timestamp)->where('user_id', $ids)->count(),
            'days' => $fill_days(),
            'labels' => $fill_labels()
        ));
    }

    public static function game_stats_days($game_id, $days) {
        $fill_days = function($days) use($game_id) {
            $out = '';
			$ids = (\App\User::where('chat_role', '<=', 3)->get()->pluck('id'));
            for($i = 0; $i < $days; $i++)
                $out .= (\App\Game::where('game_id', $game_id == -1 ? '>' : '=', $game_id)->where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))
                        ->subDays($i + 1)->timestamp)->where('time', '<=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))
                        ->subDays($i)->timestamp)->where('user_id', $ids)->count()) . ($i == $days - 1 ? '' : ',');
            return $out;
        };
        $fill_labels = function($days) use($game_id) {
            $out = '';
            for($i = 0; $i < $days; $i++)
                $out .= '"'.($i > 0 ? $i .' д назад' : 'Сегодня').'"'. ($i == $days - 1 ? '' : ',');
            return $out;
        };
        $ids = (\App\User::where('chat_role', '<=', 3)->get()->pluck('id'));
        return json_encode(array(
            'total' => \App\Game::where('game_id', $game_id == -1 ? '>' : '=', $game_id)->where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->subDays($days)->timestamp)->where('user_id', $ids)->count(),
            'days' => $fill_days($days),
            'labels' => $fill_labels($days)
        ));
    }

}
