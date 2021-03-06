<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Task extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    public static $unguarded = true;


    public static function showtasks()
    {
        $tasks = Task::all();
        return $tasks;


    }

    public static function addtask($data){
        $data = Task::create([
            'taskname'=>$data['task'],
            'dayid'=>$data['day'],
            'folderid'=>$data['folder'],

        ]);
        return $data;

    }
    public static function gettask($data)
        {
            $task = Task::where('id', '=', $data['id'])->firstOrFail();
            return $task;
        }


    public static function deletetask($id){

        Task::where('id', '=', $id['id'])->delete();
    }
    public static function getlast(){

        $user = Task::orderBy('id', 'DESC')->first();
        return $user;
    }
    public static function delpostbyfolder($id)
    {
        Task::where('folderid', '=', $id['id'])->delete();
    }
    public static function updatetaskname ($data){

            Task::where('id', '=', $data['id'])->update([
            'taskname'=>$data['taskname']

        ]);

    }
    public static function updatefolderid ($data)
    {

        Task::where('folderid', '=', $data['id'])->update([
            'folderid' => 6

        ]);
    }
    public static function get_tasksby_folderid ($id)
    {
        $tasks = Task::where('folderid', '=', $id['id'])->take(100)->get();
        return $tasks;
    }
    public static function uodate_task_day ($data){
        Task::where('id', '=', $data['taskid'])->update([
            'dayid' => $data['colid']

        ]);

    }
    public static function update_task_folder ($data) {
        Task::where('id', '=', $data['taskid'])->update([
            'folderid' => $data['colid']

        ]);
    }

    public static function updatestatus ($data){

        Task::where('id', '=', $data['id'])->update([
            'status'=>$data['status']

        ]);

    }
    public static function updatenote($data){

        Task::where('id', '=', $data['taskid'])->update([
            'note'=>$data['note']
        ]);
    }
}
