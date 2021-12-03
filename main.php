<html>

    <body>

        <h2> New User </h2>
        <p> Register here </p>

        <!-- 
            FOR DEBUGGING ONLY - DELETE ONCE UNNEEDED
        -->

        <form method="POST" action="main.php">
            <input type="hidden" id="newUserRequest" name="newUserRequest">
            Name: <input type="text" name="userName"> <br /><br />
            Email: <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" value="Insert" name="newUserSubmit">
        </form>

        <h2> Login </h2>
        <p> Enter your username </p>
        <form method="GET" action="main.php">
            <input type="hidden" id="loginUserRequest" name="loginUserRequest">
            Email: <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" name="loginUser"></p>
        </form>

        <h2> Add to your Collection! </h2>
        <form method="POST" action="main.php">
            <input type="hidden" id="addCollectionRequest" name="addCollectionRequest">
            Email: <input type="text" name="userEmail"> <br /><br />
            Inclusion ID: <input type="text" name="inclusionId"> <br /><br />
            Collection Status (Choose between "Collected" or "Not Collected"): <input type="text" name="collectStatus"> <br /><br />
            <p><input type="submit" name="addCollection"></p>
        </form>

        <h2> Remove from your Collection! </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="deleteCollectionRequest" name="deleteCollectionRequest">
            Email: <input type="text" name="userEmail"> <br /><br />
            Inclusion ID: <input type="text" name="inclusionId"> <br /><br />
            <p><input type="submit" name="deleteCollection"></p>
        </form>

        <h2> Update Your Collection Status! </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="updateCollectionStatusRequest" name="updateCollectionStatusRequest">
            Email: <input type="text" name="userEmail"> <br /><br />
            Inclusion ID: <input type="text" name="inclusionId"> <br /><br />
            New Collection Status (Choose between "Collected" or "Not Collected"): <input type="text" name="collectionStatus"> <br /><br />
            <p><input type="submit" name="updateCollectionStatus"></p>
        </form>

        <h2> Display Collection </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getCollectionRequest" name="getCollectionRequest">
            Email: <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" name="getCollection"></p>
        </form>

        <h2> Find All Albums Produced by a KPOP group! </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="findAllAlbumsRequest" name="findAllAlbumsRequest">
            Kpop Group Name: <input type="text" name="groupName"> <br /><br />
            <p><input type="submit" name="findAllAlbums"></p>
        </form>

        <h2> Find out how many Photocards you collected so far for each artist! </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getPhotocardCountRequest" name="getPhotocardCountRequest">
            Your Login ID (Email): <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" name="getPhotocardCount"></p>
        </form>

        <h2> Find out which groups you've collected at least one photocard for! </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getGroupsCollectedRequest" name="getGroupsCollectedRequest">
            Your Login ID (Email): <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" name="getGroupsCollected"></p>
        </form>

        <h2> Find out which collectors have more inclusions than the average user on this platform!</h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getTopCollectorsRequest" name="getTopCollectorsRequest">
            <p><input type="submit" name="getTopCollectors"></p>
        </form>

        <h2> Find out which collectors have collected them all!</h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getWhoCollectedThemAllRequest" name="getWhoCollectedThemAllRequest">
            <p><input type="submit" name="getWhoCollectedThemAll"></p>
        </form>

        <!-- <h2> Display a specific Post </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getSpecificPostRequest" name="getSpecificPostRequest">
            Select: <input type="text" name="attribute"> <br /><br />
            From: <input type="text" name="table"> <br /><br />
            Where Post Date is less than: <input type="text" name="condition1"> <br /><br />
            and Post Status is: <input type="text" name="condition2"> <br /><br />
            <p><input type="submit" name="getSpecificPost"></p>
        </form> -->


        <h2> Display a specific Post </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getSpecificPostRequest" name="getSpecificPostRequest">
            <label for="attribute">Choose an Attribute</label>
                <select name="attribute" id="cars">
                    <option value="PostDate">Post Date</option>
                    <option value="OPID">Op ID</option>
                    <option value="InclusionID">Inclusion ID</option>
                </select>
                <br><br>
            <label for="table">From Table:</label>
            <select name="table" id="cars">
                <option value="WantedPost">Wanted Post</option>
                <option value="SellingPost">Selling Post</option>
                <option value="TradingPost">Trading Post</option>
            </select>
            <br><br>
            <label for="month">Where Post Date is Less Than:</label>
            <select name="month" id="cars">
                <option value="JAN">January</option>
                <option value="FEB">February</option>
                <option value="MAR">March</option>
                <option value="APR">April</option>
                <option value="MAY">May</option>
                <option value="JUN">Jane</option>
                <option value="JUL">July</option>
                <option value="AUG">August</option>
                <option value="SEP">September</option>
                <option value="OCT">October</option>
                <option value="NOV">November</option>
                <option value="DEC">December</option>
            </select>
            Date: <input type="text" name="date"> <br /><br />
            Year (Please only type the last 2 digits of the year (e.g. 2022 -> 22)): <input type="text" name="year"> <br /><br />
            <label for="status">And Post Status is:</label>
            <select name="status" id="cars">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
            </select>
            <br><br>
            <p><input type="submit" name="getSpecificPost"></p>
        </form>

        <h2> Delete User From Database</h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="deleteUserRequest" name="deleteUserRequest">
            Your Login ID (Email): <input type="text" name="userEmail"> <br /><br />
            <p><input type="submit" name="deleteUser"></p>
        </form>

        <h2> Display selling posts </h2>
        <p> Please choose whether or not to include the following information by typing "YES" or "NO" </p>
        <form method="GET" action="main.php">
            <input type="hidden" id="getSellingPostsRequest" name="getSellingPostsRequest">
            POSTID (YES/NO): <input type="text" name="postID"> <br /><br />
            POSTDATE (YES/NO): <input type="text" name="postDate"> <br /><br />
            POSTSTATUS (YES/NO): <input type="text" name="postStatus"> <br /><br />
            OPID (YES/NO): <input type="text" name="opID"> <br /><br />
            INCLUSIONID (YES/NO): <input type="text" name="inclusionID"> <br /><br />
            QUANTITY (YES/NO): <input type="text" name="quantity"> <br /><br />
            <p><input type="submit" name="getSellingPosts"></p>
        </form>

        <!-- 
            BELOW FUNCTIONS ARE FOR DEBUGGING ONLY - DELETE ONCE UNNEEDED
        -->
        <h2> Display Selected Table </h2>
        <form method="GET" action="main.php">
            <input type="hidden" id="getTableRequest" name="getTableRequest">
            Table Name: <input type="text" name="tableName"> <br /><br />
            <p><input type="submit" value="Insert" name="getTable">
        </form>

        <?php
        //php code to handle all requests
        //functions: debugAlertMessage, executePlainSQL, printResult, connectToDB
        // disconnectFromDB, handleGET/POSTrequest are taken from tutorial 7.
        // some have been modified to fit our project.

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function debug_to_console($data) {
            echo "<script>console.log(\"Debug Objects: '$data' \");</script>";
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            // can remove below code- used for debugging
            debug_to_console($cmdstr);

            $statement = OCIParse($db_conn, $cmdstr); 
            
            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }
            
			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($title, $result) { //prints results from a select statement
            echo "<h1>$title<h1>";
            echo "<table>";
            
            // print table column names
            $columnsCount = oci_num_fields($result);
            echo "<tr>";
            for($i = 1; $i <= $columnsCount; $i++) {
                $colname = OCI_Field_Name($result, $i);
                echo "  <th>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</th>";
            }
            echo "</tr>";

            while (($row = OCI_Fetch_Array($result, OCI_ASSOC)) != false) {
                echo "<tr>";
                foreach ($row as $columnName => $columnValue){
                    //print one data column
                    echo "<td>".$columnValue."</td>";
                }
                echo "</tr>";
            
            }

            echo "</table>";
            // original - restore if the above doesn't work
            // echo "<br>User info:<br>";
            // echo "<table>";
            // echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

            // while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            //     echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>"; //or just use "echo $row[0]" 
            // }

            // echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_davidk15", "a36304153", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        //here on put in request handlers

        // REQRUIEMENT - INSERT
        // WORKING
        //Register new user 
        function handleNewUserRequest(){
            global $db_conn;

            $uid = uniqid("uid_");

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['userName'],
                ":bind2" => $_POST['userEmail']
            );

            $alltuples = array (
                $tuple
            );
            
            executeBoundSQL("INSERT into Users(userID, userName, userEmail) values('$uid', :bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        // WORKING
        //"login" user
        function handleLoginUserRequest(){
            global $db_conn;

            $user_email = $_GET['userEmail'];

            // $result = executePlainSQL("SELECT * FROM Users");
            $result = executePlainSQL("SELECT * FROM Users where userEmail= '$user_email'");

            printResult("Basic User Information", $result);
            OCICommit($db_conn);
        }

        // WORKING
        // DELETES USER
        // DELETE ON CASCADE EXAMPLE
        function handleUserDeleteRequest(){
            global $db_conn;

            $userEmail = $_GET['userEmail'];
            $userID = getUserIDFromEmail($userEmail);

            $result = executePlainSQL("DELETE FROM Users WHERE userID = '$userID'");

            if($result == true) {
                printResult("Deleted $userEmail from database!", "");
                // echo "Deleting";
            }
            else {
                echo "Error Deleting";
            }
            OCICommit($db_conn);
        }

        // REQUIREMENT - PROJECTION
        // WORKING - need sufficient data already populatd in the table though
        //get and display user's current collection
        function handleGetCollectionRequest(){
            global $db_conn;

            $userEmail = $_GET['userEmail'];

            $userID = getUserIDFromEmail($userEmail);

            // original - restore once table is more populated
            $result = executePlainSQL("SELECT distinct i.inclusionID, i.albumName, i.versionName, a.groupName, a.stageName 
                                        FROM Inclusion i, Photocard p, Artist a, CollectInclusion ci 
                                        WHERE ci.userID ='$userID' AND ci.collectStatus = 'Collected' AND ci.inclusionID = p.inclusionID 
                                                AND ci.inclusionID = i.inclusionID AND p.artistID = a.artistID");
                    
            // it prints properly on console - but not via php - need to figure out how to print
            // this returns 2 tables for some reason? 
            // $result = executePlainSQL("SELECT distinct i.inclusionID, albumName, versionName, groupName, stageName 
            //     FROM Inclusion i, Photocard p, Artist a, CollectInclusion ci 
            //     WHERE ci.userID ='uID_test   ' AND ci.collectStatus = 'Collected'");
            
            printResult("Your Current Collection", $result);
        }

        // REQUIREMENT - SELECTION
        function getUserIDFromEmail($userEmail) {
            $query = executePlainSQL("SELECT userID FROM Users where userEmail= '$userEmail'");
            $row = OCI_FETCH_ROW($query);
            $userID = $row[0];
            
            debug_to_console($userID);

            return $userID;
        }

        // REQUIREMENT - INSERT
        // WORKING - NOTE: the inclusion must already exist in the database for this to work
        //user can add inclusions to their collection
        function addCollectionRequest(){
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['userEmail'],
                ":bind2" => $_POST['inclusionId'],
                ":bind3" => $_POST['collectStatus'],
            );

            $userID = getUserIDFromEmail($_POST['userEmail']);

            debug_to_console($userID);

            $alltuples = array (
                $tuple
            );
            
            executeBoundSQL("INSERT into CollectInclusion(userID, inclusionID, collectStatus) values('$userID', :bind2, :bind3)", $alltuples);
            OCICommit($db_conn);
        }

        // REQUIREMENT - DELETE     
        // Works
        //delete from user collection
        function handleDeleteCollectionRequest(){
            global $db_conn;
            
            $userID = getUserIDFromEmail($_GET['userEmail']);
            $inclusion_id = $_GET['inclusionId'];

            $result = executePlainSQL("DELETE FROM CollectInclusion WHERE userID = '$userID' AND inclusionID= '$inclusion_id'");
            
            if($result != true) {
                echo "Error deleting";
            }
            OCICommit($db_conn);
        }

        // REQUIREMENT - UPDATE
        // Works
        //update collection status
        function handleUpdateCollectionStatusRequest(){
            global $db_conn;
            
            $userID = getUserIDFromEmail($_GET['userEmail']);
            $inclusion_id = $_GET['inclusionId'];
            $collectionStatus = $_GET['collectionStatus'];

            $result = executePlainSQL("UPDATE CollectInclusion SET collectStatus='$collectionStatus' WHERE userID='$userID' AND inclusionID='$inclusion_id'");
            
            if($result != true) {
                echo "Error deleting";
            }

            OCICommit($db_conn);
        }

        // REQUIREMENT - JOIN
        // working
        // Find the album names of the selected kpop group
        function handleFindAlbumsRequest() {
            global $db_conn;

            $groupName = $_GET['groupName'];

            $result = executePlainSQL("SELECT Album.albumName, Album.versionName, Album.dateCreated FROM Album INNER JOIN KpopGroup ON Album.groupName = KpopGroup.groupName WHERE Album.groupName = '$groupName'");
            
            printResult("All Albums from $groupName", $result);
            OCICommit($db_conn);
        }

        // REQUIREMENT - AGGREGATION WITH GROUP BY
        // working
        // find how many photocards the user has for each Artist
        function handleGetPhotocardCountRequest() {
            global $db_conn;

            $userID = getUserIDFromEmail($_GET['userEmail']);
            
            $result = executePlainSQL("SELECT Artist.stageName, COUNT(DISTINCT Photocard.inclusionID) FROM Artist, Photocard, CollectInclusion WHERE CollectInclusion.userID = '$userID' AND CollectInclusion.inclusionID = Photocard.inclusionID AND Photocard.artistID = Artist.artistID AND CollectInclusion.collectStatus = 'Collected' GROUP BY Artist.stageName");
        
            printResult("Number of photocards you collected", $result);
            OCICommit($db_conn);
        }

        // REQUIREMENT - AGGREGATION WITH HAVING
        // Find all the groups for which a user has collected at least 1 photocard
        // Working
        function handleGetGroupsCollectedRequest(){
            global $db_conn;
            
            $userID = getUserIDFromEmail($_GET['userEmail']);

            $result = executePlainSQL("SELECT Artist.groupName, COUNT(DISTINCT Photocard.inclusionID) FROM Artist, Photocard, CollectInclusion WHERE CollectInclusion.userID = '$userID' AND CollectInclusion.inclusionID = Photocard.inclusionID AND Photocard.artistID = Artist.artistID AND CollectInclusion.collectStatus = 'Collected' GROUP BY Artist.groupName HAVING COUNT(*) > 0");
            
            printResult("Groups where you've collected $number photocards", $result);
            OCICommit($db_conn);
        }

        // NESTED AGGREGATION WITH GROUP BY
        // find all users who have collected more inclusions than the average user on this platform
        // Working
        function handleGetTopCollectorsRequest(){
            global $db_conn;

            $result = executePlainSQL("SELECT u1.userID, COUNT(CollectInclusion.inclusionID) as uCount FROM Users u1, CollectInclusion WHERE CollectInclusion.userID = u1.userID GROUP BY u1.userID HAVING (SELECT COUNT(*) FROM CollectInclusion, Users u2 WHERE u1.userID = u2.userID AND CollectInclusion.userID = u1.userID AND CollectInclusion.collectStatus = 'Collected') > (SELECT avg(u.icount) FROM (SELECT COUNT(CollectInclusion.inclusionID) as icount FROM Users, CollectInclusion WHERE CollectInclusion.userID = Users.userID AND CollectInclusion.collectStatus = 'Collected' GROUP BY Users.userID) u )");

            printResult("Top collectors", $result);
            OCICommit($db_conn);
        }

        // DIVISION
        // find users who have collected at least one inclusion from every group
        function handleGetWhoCollectedThemAllRequest(){
            global $db_conn;

            $result = executePlainSQL("SELECT u.userID FROM Users u WHERE NOT EXISTS ( (SELECT KpopGroup.groupName FROM KpopGroup) MINUS (SELECT Album.groupName FROM Album, CollectInclusion, Inclusion WHERE CollectInclusion.userID = u.userID AND CollectInclusion.inclusionID = Inclusion.inclusionID AND Inclusion.albumName = Album.albumName AND Inclusion.versionName = Album.versionName AND CollectInclusion.collectStatus = 'Collected') )");

            printResult("These users collect all the groups!", $result);
            OCICommit($db_conn);
        }

        // SELECTION 
        function handleGetSpecificPostRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            
            $tableName = $_GET['table'];
            $attributeName = $_GET['attribute'];
            $month = $_GET['month'];
            $date = $_GET['date'];
            $year = $_GET['year'];
            $status = $_GET['status'];

            $fulldate = "$date/$month/$year";

            // echo($fulldate);
            
            $result = executePlainSQL("SELECT $attributeName FROM Post p, $tableName WHERE p.postID = $tableName.postID AND p.postDate < '$fulldate' AND p.postStatus = '$status'");
            
            printResult("Selected $attributeName from $tableName where (Post Date < $fulldate) and (Post Status = $status)", $result);
            OCICommit($db_conn);
        }

        //PROJECTION
        //select from post table
        function handleGetSellingPosts(){
            global $db_conn;
            $postID = $_GET['postID'];
            $postDate = $_GET['postDate'];
            $postStatus = $_GET['postStatus'];
            $opID = $_GET['opID'];
            $inclusionID = $_GET['inclusionID'];
            $quantity = $_GET['quantity'];

            $projection = "";

            if($postID == 'YES'){
                $projection .= " p.postID,";
            }
            if($postDate == 'YES'){
                $projection .= " p.postDate,";
            }
            if($postStatus == 'YES'){
                $projection .= " p.postStatus,";
            }
            if($opID == 'YES'){
                $projection .= " p.opID,";
            }
            if($inclusionID == 'YES'){
                $projection .= " p.inclusionID,";
            }
            if($quantity == 'YES'){
                $projection .= " p.quantity,";
            }

            $formattedProjection = substr($projection, 0, -1);

            $result = executePlainSQL("SELECT" . $formattedProjection . " FROM Post p, SellingPost sp WHERE p.postID = sp.postID");

            printResult("Selling Posts", $result);
            OCICommit($db_conn);
        }


        // // to-do
        // // UNTESTED
        // //user can create a sale post
        // function handleCreateSellingPostRequest(){
        //     global $db_conn;

        //     $tuple = array (
        //         ":bind1" => $_POST['postId'],
        //         ":bind2" => $_POST['postDate'],
        //         ":bind3" => $_POST['userId'],
        //         ":bind4" => $_POST['inclusionId'],
        //         ":bind5" => $_POST['price'],
        //         ":bind6" => $_POST['quantity'],
        //         ":bind7" => $_POST['merchId']
        //     );

        //     $alltuples = array (
        //         $tuple
        //     );

        //     executeBoundSQL("INSERT into Post(postID, postDate, postStatus, opID, inclusionID, quantity, merchID) values(:bind1, :bind2, 'Active', :bind3, :bind4, :bind6, :bind7)", $alltuples);
        //     executeBoundSQL("INSERT into SellingPost(postID, price) values(:bind1, :bind5)", $alltuples);
        //     OCICommit($db_conn);
        // }

        // // UNTESTED
        // //browse selling posts
        // function handleGetSellingPostRequest(){
        //     global $db_conn;

        //     $result = executePlainSQL("SELECT * FROM Post p, SellingPost sp WHERE p.postID = sp.postID AND p.postStatus = 'Active'");

        //     printResult($result);
        // }

        // // UNTESTED
        // //filter selling posts by artist
        // function handleGetSellingPostByArtistRequest(){

        // }

        // // UNTESTED
        // //update selling post
        // function handleBuyPostRequest(){
        //     global $db_conn;

        //     $post_id = $_POST['postId'];

        //     executePlainSQL("UPDATE Post SET postStatus='Closed'");
        //     OCICommit($db_conn);
        // }

        function handleGetTableRequest() {
            global $db_conn;

            $tableName = $_GET['tableName'];

            $result = executePlainSQL("SELECT * FROM $tableName");

            printResult("Table Info for: $tableName", $result);
        }


        // (NOT REQUIRED) Below are skeletons of core 'features' we could include to make the database more customizable
        // // UNTESTED
        // // any user can insert a new inclusion 
        // function handleUserAddInclusion() {
        //     global $db_conn;

        //     $inclusion_id = $_GET('inclusionID');
            
        // }
        // // UNTESTED
        // // any user can insert a new inclusion 
        // function handleUserAddAlbum() {
        //     global $db_conn;
 
        // }


        function handlePOSTRequest(){
            if(connectToDB()){
                //route post requests
                if(array_key_exists('newUserRequest', $_POST)){
                    handleNewUserRequest();
                }
                if(array_key_exists('addCollection', $_POST)){
                    addCollectionRequest();
                }
                disconnectFromDB();
            }
        }

        function handleGETRequest(){
            if(connectToDB()){
                //route requests
                if(array_key_exists('loginUser', $_GET)){
                    handleLoginUserRequest();
                }
                else if(array_key_exists('deleteUser', $_GET)) {
                    handleUserDeleteRequest();
                }
                else if(array_key_exists('getCollection', $_GET)){
                    handleGetCollectionRequest();
                }
                else if(array_key_exists('getTable', $_GET)){
                    handleGetTableRequest();
                }
                else if(array_key_exists('deleteCollection', $_GET)){
                    handleDeleteCollectionRequest();
                }    
                else if(array_key_exists('updateCollectionStatus', $_GET)) {
                    handleUpdateCollectionStatusRequest();
                }
                else if(array_key_exists('findAllAlbums', $_GET)){
                    handleFindAlbumsRequest();
                }
                else if(array_key_exists('getPhotocardCount', $_GET)) {
                    handleGetPhotocardCountRequest();
                }
                else if(array_key_exists('getGroupsCollected', $_GET)){
                    handleGetGroupsCollectedRequest();
                }
                else if(array_key_exists('getTopCollectors', $_GET)){
                    handleGetTopCollectorsRequest();
                }
                else if(array_key_exists('getWhoCollectedThemAll', $_GET)){
                    handleGetWhoCollectedThemAllRequest();
                }
                else if(array_key_exists('getSpecificPost', $_GET)) {
                    handleGetSpecificPostRequest();
                }
                else if(array_key_exists('getSellingPosts', $_GET)){
                    handleGetSellingPosts();
                }
                disconnectFromDB();
            }
        }

        //if else statement here to route each request
        if(isset($_POST['newUserSubmit']) || isset($_POST['addCollectionRequest'])){
            handlePOSTRequest();
        }
        else if(isset($_GET['loginUserRequest']) || isset($_GET['deleteUserRequest']) || isset($_GET['getCollectionRequest'])
                || isset($_GET['getTableRequest']) || isset($_GET['deleteCollectionRequest'])
                || isset($_GET['updateCollectionStatusRequest']) || isset($_GET['findAllAlbumsRequest'])
                || isset($_GET['getPhotocardCountRequest']) || isset($_GET['getGroupsCollectedRequest'])
                || isset($_GET['getTopCollectorsRequest']) || isset($_GET['getWhoCollectedThemAllRequest']) 
                || isset($_GET['getSellingPostsRequest']) || isset($_GET['getSpecificPostRequest'])){
            handleGETRequest();
        }

        ?>
    </body>

</html>