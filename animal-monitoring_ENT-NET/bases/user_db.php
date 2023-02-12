<?php
class User_db {
    
    function __construct(){}
    static function get_user_by_id($ID){
        $db = database::getDB();
            $query = "SELECT * FROM user WHERE ID = :ID";
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $user = $statement->fetchAll();
        $statement->closeCursor();
        foreach ($user as $userData){
            $wlUser = new User(
                $userData['id'],   
                $userData['userTypeID'],    
                $userData['firstName'],
                $userData['lastName'],
                $userData['phone'],                   
                $userData['email'],
                $userData['address'],
                $userData['city'],
                $userData['state'],
                $userData['zip'],
                $userData['password'], 
                $userData['isActive']
                    );
        }
        return $wlUser;
    }
    static function get_user_by_email_password($email,$password){
        $db = database::getDB();
        $query = 'SELECT * FROM user '
                    . 'WHERE email =  :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $user = $statement->fetchAll();
        $statement->closeCursor();
        foreach ($user as $userData){
            $wlUser = new User(
                $userData['id'],   
                $userData['userTypeID'],    
                $userData['firstName'],
                $userData['lastName'],
                $userData['phone'],                   
                $userData['email'],
                $userData['address'],
                $userData['city'],
                $userData['state'],
                $userData['zip'],
                $userData['password'], 
                $userData['isActive']
                    ); 
        }
        return $wlUser;
    }
    static function add_user($dmUser){
        $db = database::getDB();  
        $query = 'INSERT user
                     (userTypeID, firstName, lastName, phone, email, address, city, state, zip, password, isActive)
                  VALUES
                     (1, :firstName, :lastName, :phone, :email, :address, :city, :state, :zip, :password, 1)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $dmUser->getFirstName());
        $statement->bindValue(':lastName', $dmUser->getLastName());
        $statement->bindValue(':phone', $dmUser->getPhone());
        $statement->bindValue(':email', $dmUser->getEmail());
        $statement->bindValue(':address', $dmUser->getAddress());
        $statement->bindValue(':city', $dmUser->getCity());
        $statement->bindValue(':state', $dmUser->getState());
        $statement->bindValue(':zip', $dmUser->getZip());
        $statement->bindValue(':password', $dmUser->getPassword()); 

        $statement->execute();
        $statement->closeCursor();
    }
    static function search_user_list_email($email){
        $db = database::getDB();
            $query = "SELECT * FROM user
                WHERE email LIKE '%$email%'
                               ORDER BY ID";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        if($users == null || $users == false){
            return false;
        }else {return true;}
    }
}
?>