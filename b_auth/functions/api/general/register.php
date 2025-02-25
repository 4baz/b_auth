<?php
namespace api;

use functions;
use responses;

use api\validation;
use api\fetch;
use mysqli_wrapper;

function register_user(mysqli_wrapper $c_con, $program_key, $username, $email, $password, $hwid, $token_data) {
    $user_amount = $c_con->query('SELECT c_program FROM c_program_users WHERE c_program=?', [$program_key])->num_rows;

    $max_amount = general\is_premium($c_con, $program_key) ? 5000 : 50;

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

 //   $final_time = strtotime(functions::get_time_to_add($token_data['c_days']));
//when user signs up instead of taking token and inserting the time into there time
//we instead give them a second of time in there account
//user can then redeem there own token too add time after they signup
//that is also why the invalid token response is commented out bellow 
$final_time = strtotime("now +1 second");
//$token_data = 0;
    if ($user_amount > $max_amount)
        return 'maximum_users_reached';

    $c_con->query('INSERT INTO c_program_users (c_program, c_username, c_email, c_password,c_hwid,c_ip) VALUES(?, ?, ?, ?, ?, ?)',
        [$program_key, $username, $email, $hashed_password, $hwid,functions::get_ip()]);

    //insert the new created user ^

    return responses::success;

}
//token is kept so it can just parse a null value bc uhhhh i cant be bothered rewriting other shit
function register(mysqli_wrapper $c_con, $program_key, $username, $email, $password, $token, $hwid) {
    $program_validation = validation\validate_program($c_con, $program_key);

    if ($program_validation !== responses::success)
        return $program_validation;

    $registering_validation = validation\validate_registering_data($c_con, $program_key, $username, $email);

    if ($registering_validation !== responses::success)
        return $registering_validation;

    $token_data = fetch\fetch_token($c_con, $program_key, $token);

    //commented out bc we dont check the token on rego
   // if (!is_array($token_data))
   //     return $token_data;

   // if ($token_data['c_used'] == '1')
   //     return responses::already_used_token;

  //  $c_con->query('UPDATE c_program_tokens SET c_used=1, c_used_by=? WHERE c_program=? AND c_token=?', [$username, $program_key, $token]);

    return register_user($c_con, $program_key, $username, $email, $password, $hwid, $token_data);
}

