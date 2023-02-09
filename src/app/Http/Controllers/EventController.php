<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();
        $this->category = new Category();
    }

    /**
     * イベント一覧画面
     */
    public function index(Request $request)
    {
        $word = $request->search;
        
        if (!is_null($word)) {
            $events = $this->event->searchWord($word);
        } else {
            $events = $this->event->allEventsData();
        }


        return view('event.index', compact('events'));
    }

    public function register() {
        $categories = $this->category->allCategoriesData();
        return view('event.register',compact('categories'));
    }

    public function create(EventRequest $request) {
        try {
            // トランザクション開始
            DB::beginTransaction();
            // リクエストされたデータをもとにeventsテーブルにデータをinsert
            $insertEvent = $this->event->insertEventData($request);
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // 例外を投げる
            \Log::error($e);

            return redirect()->route('event.index')->with('error', 'もくもく会の登録は失敗しました');
        }
        return redirect()->route('event.index')->with('successs',"もくもく会の登録に成功しました");
    }

    public function show($id) {

        $event = $this->event->findEventByEventId($id);

        $date = date("m/d",strtotime($event->date));

        $getWeek = date('w', strtotime($event->date));

        $week = [
            '日', 
            '月', 
            '火', 
            '水', 
            '木', 
            '金', 
            '土', 
        ];

        $start_time = substr($event->start_time, 0,-3);

        $end_time = substr($event->end_time, 0, -3);

        return view('event.show', compact('event','date','getWeek','week','start_time','end_time'));
    }

    public function edit(Request $request, $id) {
        $categories = $this->category->allCategoriesData();
        $event = $this->event->findEventByEventId($id);
        return view('event.edit', compact('categories','event'));
    }

    public function update(EventRequest $request) {
        
        $eventId = $request->event_id;

        $event = $this->event->findEventByEventId($eventId);

        try {
            DB::beginTransaction();
            // 更新対象のレコードの更新処理を実行
            $isUpdated = $this->event->updatedEventData($request, $event);
            
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()->route('event.index')->with('error', 'もくもく会の更新に失敗しました。');
        }

        return redirect()->route('event.index')->with('success', 'もくもく会の更新は成功しました');
    }

    public function delete($id) {
        try {
            // トランザクション開始
            DB::beginTransaction();
            // もくもく会のイベントを削除する
            $isDelete = $this->event->deleteEventData($id);

            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()->route('event.index')->with('error', 'もくもく会の削除に失敗しました。');
        }
        return redirect()->route('event.index')->with('success', 'もくもく会の削除に成功しました。');
    }
}