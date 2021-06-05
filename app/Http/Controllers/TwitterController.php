<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function show()
    {
        return view('show_twitter');
    }


    public function store(Request $request)
    {
        set_time_limit(0);

        //各検索ボックスから送られてきた値を変数に
        $first = $request->first_box;
        
        //FirstBoxのフレンドを取得(5000ずつ単位でcursorが生成されるので、cursorが０でない限りループ)
        $first_friend_data = \Twitter::get('followers/ids', ['screen_name' => $first]);
        // dd($first_friend_data);

        if ($first_friend_data)
        $first_friend_ids = $first_friend_data->ids;
        $first_cursor = $first_friend_data->next_cursor;
        $i = 1;
        while ($first_cursor !== 0) {
            $first_next_data = \Twitter::get('followers/ids', ['screen_name' => $first, 'cursor' => $first_cursor]);
            $first_next_ids = $first_next_data->ids;
            $first_friend_ids = array_merge($first_friend_ids, $first_next_ids);
            $first_cursor = $first_next_data->next_cursor;
            $i++;
        };
        
        // dd($first_friend_ids); //ここまでは完璧

        $friend_ids = $first_friend_ids;

        $users_data = $friend_ids;
        $user_data = [];
        for ($i=0; $i < count($users_data); $i++) {
            if(strlen($users_data[$i]) > 17) {
                array_push($user_data, $users_data[$i]);
            }
        }
        
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y_m_d');
        $dirPath = '/Users/ikedayu/Documents/paylove';
        $file_name = $first."_".$date;
        $createCsvFilePath = $dirPath."/".$file_name.".csv";
        touch($createCsvFilePath);
        $file_handler = fopen($createCsvFilePath, "w");
        fputcsv($file_handler, $user_data);
        return view('show_twitter', [
            'users_data' => $users_data,
        ]);
    }

    public function check() {
        $limits = \Twitter::get('application/rate_limit_status');
        // dd($limits);
        dd($limits->resources->followers);
    }
    
    public function reverse() {
        return view('reverse');
    }


}
