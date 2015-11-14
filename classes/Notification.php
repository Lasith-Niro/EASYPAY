<?php
/**
 * Created by PhpStorm.
 * User: lasith-niro
 * Date: 17/10/15
 * Time: 11:37
 */

class Notification {
    private $_Ndb,
            $_Ndata;

    public function __construct($Notification = null){
        $this->_Ndb = DB::getInstance();
    }

    public function createNotification($fields = array()) {
        if(!$this->_Ndb->insert('notification', $fields)){
            throw new Exception('There was a problem in connection');
        }
    }

    public function deleteNotification($id){
        if(!$this->_Ndb->delete('notification', array('nID', '=', $id))){
            throw new Exception('There was a problem in connection');
        }
    }

//    public function assignBatch($year){
//        $student = array();
//        $student = $this->_Ndb->getAll('SELECT id', 'users', '$year');
//
//
//    }

    public function getBatch($year){
            //$field = (is_numeric($user)) ? 'id' : 'username';
         $data = $this->_Ndb->getID('users', array('year' , '=' , $year))->results();
        return $data;
    }

    public function assignBatch($fields=array()){
        if(!$this->_Ndb->insert('user_notification', $fields)){
            throw new Exception('There was a problem in connection');
        }
    }

    public function outNotifications($uID){
        return $this->_Ndb->get('user_notification',array('uID','=',$uID))->results();

    }

    public function printNotification($notificationID){
        return $this->_Ndb->get('notification', array('nID','=',$notificationID))->results();
    }

    public function getData(){
        return $this->_Ndb->getAll('SELECT *', 'notification', 'nID');
    }

    public function data(){
        return $this->_Ndata;
    }

    public function getNotificationID(){
        return $this->_Ndata->nID;
    }
}
?>