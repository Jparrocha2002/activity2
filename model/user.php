<?php 

include '../database/db.php';
header('Content-type: application/json');
class User extends Database
{
    public function insert($params)
    {
        if(!isset($params['first_name']) || empty($params['first_name']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'first_name is required'
            ]);
        }

        if(!isset($params['last_name']) || empty($params['last_name']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'last_name is required'
            ]);
        }

        if(!isset($params['age']) || empty($params['age']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'age is required'
            ]);
        }

        if(!isset($params['gender']) || empty($params['gender']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'gender is required'
            ]);
        }

            $first_name = $params['first_name'];
            $last_name = $params['last_name'];
            $age = $params['age'];
            $gender = $params['gender'];

            $insert = "INSERT INTO person(first_name,last_name,age,gender)VALUES('$first_name','$last_name','$age','$gender')";
            $isInserted = $this->conn->query($insert);

            if($isInserted)
            {
                return json_encode([
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
        $data = $this->conn->query('SELECT * FROM person');
        if($data->num_rows > 0)
        {
            $all = $data->fetch_all(MYSQLI_ASSOC);
            echo json_encode($all);
        }
    }

    public function search()
    {
        if(isset($_GET) || empty($_GET))
        {
            return json_encode([
                'code' => 422,
                'message' => 'put information first'
            ]);
        }

        $gender = isset($_GET['gender']) ? $_GET['gender'] : '';

        $data = $this->conn->query("SELECT * FROM person WHERE gender LIKE '%$gender%'");

        // if($data)
        // {

        // }
    }
}

?>