<?php 

include '../database/db.php';
header('Content-type: application/json');
class UserController extends Database
{
    public function insert($params)
    {
        $array = ['first_name','last_name','email','password','token'];

        foreach($array as $key)
        {
            if(empty($params[$key]))
            {
                return json_encode([
                    'code' => 401,
                    'message' => "$key is required"
                ]);
            }
        }
            $first_name = $params['first_name'];
            $last_name = $params['last_name'];
            $email = $params['email'];
            $password = $params['password'];
            $token = $params['token'];

            $insert = "INSERT INTO user(first_name,last_name,email,password,token)VALUES('$first_name','$last_name','$email','$password','$token')";
            $isInserted = $this->conn->query($insert);

            if($isInserted)
            {
                return json_encode([
                    'code' => 200,
                    'message' => 'inserted successfully'
                ]);
            } else {
                return json_encode([
                    'message' => 'error'
                ]);
            }
        
    }

    public function getAll()
    {
        $data = $this->conn->query('SELECT * FROM user');
        $result = $data->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function search($search)
    {
        if(empty($search['email']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'please put email information first'
            ]);
        }

        $email = $search['email'] ?? '';
        $data = $this->conn->query("SELECT * FROM user WHERE email LIKE '%$email%'");

        if($data)
        {
            $result = $data->fetch_all(MYSQLI_ASSOC);
            return $result;
        } else {
            return json_encode([
                'message' => 'error'
            ]);
        }
    }
}

?>