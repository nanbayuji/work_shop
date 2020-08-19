<?php

require_once 'dbconnect.php';

class UserLogic{
  /**
   * ユーザを登録する
   * @param array $userData
   * @return bool $result
   */
    public static function createUser($userData){
      $result = false;

      $sql = 'INSERT INTO users (name, password) VALUES (?, ?)';

      //ユーザデータを配列に入れる
      $arr = [];
      $arr[] = $userData['username'];
      $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);//パスワードをハッシュ化
      try{
        $stmt = connect() -> prepare($sql);
        $result = $stmt -> execute($arr);
        return $result;
      }catch(\Exception $e){
        return $result;
      }
    }

    /**
    *ログイン処理
    * @param string $username
    * @param string $password
    * @return bool $result
    */
    public static function login($username, $password){
      //結果
      $result = false;
      //ユーザをusernameから検索して取得
      $user = self::getUserByUsername($username);

      if(!$user){
        $_SESSION['msg'] = 'ユーザ名が一致しません。';
        return $result;
      }

      //パスワードの照会
      if(password_verify($password, $user['password'])){
        //ログイン成功
        session_regenerate_id(true);
        $_SESSION['login_user'] = $user;
        $result = true;
        return $result;
      }

      $_SESSION['msg'] = 'パスワードが一致しません。';
      return $result;

  }

      /**
    *usernameからユーザを取得
    * @param string $username
    * @return array|bool $user|false
    */
    public static function getUserByUsername($username){
      //SQLの準備
      //SQLの実行
      //SQLの結果を返す
      $sql = 'SELECT * FROM users WHERE name = ?';

      //ユーザ名を配列に入れる
      $arr = [];
      $arr[] = $username;

      try{
        $stmt = connect() -> prepare($sql);
        $stmt -> execute($arr);
        //SQLの結果を返す
        $user = $stmt -> fetch();
        return $user;
      }catch(\Exception $e){
        return false;
      }
  }

    /**
    *ログインチェック
    * @param void
    * @return bool $result
    */
    public static function checkLogin(){
      $result = false;

      //セッションにログインユーザが入っていなかったらfalse
      if(isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0){
        $result = true;
      }

      return $result;
    }

    /**
     * ログアウト処理
     */
    public static function logout(){
      $_SESSION = array();
      session_destroy();
    }

}
?>