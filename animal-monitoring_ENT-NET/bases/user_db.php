<?php
class User_db {
    
    function __construct(){}
    static function get_user_by_id($ID){
        $db = database::getDB();
            $query = "SELECT * FROM user WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $ID);
        $statement->execute();
        $baseUser = $statement->fetchAll();
        $statement->closeCursor();
        foreach ($baseUser as $userData){
            $user = new User(
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
        return $user;
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
    static function list_users(){
        $db = database::getDB();
        $query = 'SELECT * FROM user;';
        $statement = $db->prepare($query);
        $statement->execute();
        $user = $statement->fetchAll();
        $statement->closeCursor();
        $users;
        foreach ($user as $userData){
            $users[] = new User(
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
                0, //do not pull the Password here! 
                $userData['isActive']
                    ); 
        }
        return $users;    
    }
    static function add_user($User){
        $db = database::getDB();  
        $query = 'INSERT user
                     (userTypeID, firstName, lastName, phone, email, address, city, state, zip, password, isActive)
                  VALUES
                     (1, :firstName, :lastName, :phone, :email, :address, :city, :state, :zip, :password, 1)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $User->getFirstName());
        $statement->bindValue(':lastName', $User->getLastName());
        $statement->bindValue(':phone', $User->getPhone());
        $statement->bindValue(':email', $User->getEmail());
        $statement->bindValue(':address', $User->getAddress());
        $statement->bindValue(':city', $User->getCity());
        $statement->bindValue(':state', $User->getState());
        $statement->bindValue(':zip', $User->getZip());
        $statement->bindValue(':password', $User->getPassword()); 

        $statement->execute();
        $statement->closeCursor();
    }
    static function update_user($user){
        $db = database::getDB();  
        $query = 'UPDATE user SET firstName = :firstName, lastName = :lastName, phone = :phone, email = :email, address = :address, city = :city, state = :state, zip = :zip, password = :password, isActive = :isActive  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $user->getFirstName());
        $statement->bindValue(':lastName', $user->getLastName());
        $statement->bindValue(':phone', $user->getPhone());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':address', $user->getAddress());
        $statement->bindValue(':city', $user->getCity());
        $statement->bindValue(':state', $user->getState());
        $statement->bindValue(':zip', $user->getZip());
        $statement->bindValue(':password', $user->getPassword());
        $statement->bindValue(':isActive', $user->getIsActive());
        $statement->bindValue(':id', $user->getId());

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