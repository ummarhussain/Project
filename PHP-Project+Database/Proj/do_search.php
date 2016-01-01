<?php
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    include('db.php');
    $db = new db();
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysql_real_escape_string($_POST['search']);
    $word = htmlentities($word);
    // build your search query to the database
    $sql = "SELECT username, u_username FROM Customer WHERE username LIKE '%" . $word . "%' ORDER BY PHONE";
    // get results
    $row = $db->select_list($sql);
    if(count($row)) {
        $end_result = '';
        foreach($row as $r) {
            $result         = $r['title'];
            // we will use this to bold the search word in result
            $bold           = '<span class="found">' . $word . '</span>';    
            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';            
        }
        echo $end_result;
    } else {
        echo '<li>No results found</li>';
    }
}
?>