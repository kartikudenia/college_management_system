<?php 
session_start();
$loggedin = false;
if(!isset($_SESSION['s_logged']) && $_SESSION['s_loggedin'] != true)
{
  header("location: login_student.php");
  exit;
}
else
{
  $loggedin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sidebar.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Student Dashboard</title>
  
<style>
 .welcome_container {
    background: linear-gradient(to left, rgb(242,245,254), rgb(255,255,254));
    width: 637px;
    margin: auto;
    border: 1px solid #eeeeee;
    border-radius: 10px 10px;
    margin-top: 20px;
}
  .quote_container{
    margin:20px;
    width: 500px;
    background:rgb(242,245,254);
    border: 1px solid #eeeeee;
    border-radius: 10px 10px;
  }
  .welcome_back{
    color:#45B9EF;
    font-weight: 500;
    margin-top:-26px;
    margin-left:20px;

  }
  .photo_{
    
    position: relative;
    left: 535px;
    bottom: -82px;
}
</style>
</head>
<body>
  <?php 
  $activeTab = "dashboard";
  include "sidebar.php"; 
  $name_parts = explode(" ",$_SESSION['sname']);
  ?>
  <div class="main_">
    <div class="welcome_container">
      <img src="quote_icon.png" class="photo_" alt="" width="50px">
      <h3 class="welcome_back"><?php echo "Welcome Back, ".$name_parts[0]." !"; ?></h3>
      <div class="quote_container">
        <p class="quote" style="margin-top: 5px;margin-left: 10px;margin-bottom: 0;font-weight: 600;">Quote of the Day
        </p>
        <p id="quoteText" style="padding-top: 5px;margin-left: 10px;"></p>
      </div>
    </div>
    <div class="disp_flex">
    <div class="noticeboard">
      <div class="heading">
        <h3 style="padding-top: 10px;">Notice Board</h3>
      </div>
      <div class="inner-notice">
        <table id="noticeId">
          <tbody>
            <?php 
                $sql1 = "SELECT * FROM `noticeboard_table`";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) == 0)
                {
                    echo '<div style="text-align:center;">No Data Available </div>';
                }
                else{
                while ($row = mysqli_fetch_assoc($result)) {
                    $content = $row['n_content'];
                    $id = $row['n_id'];
                    $date = $row['n_date'];
                    echo '
                    <tr>
                    <td class="notice_content">'.$content.'</td>
                    <td class="datetable">'.$date.'</td>';
                }
            }
                ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="chartgender">
          <div style="font-weight: bold">Total students By gender</div>

          <div id="chartContainer" style="height: 300px; width: 300px; position: relative; left: 8px;"></div>
          <!-- <span class="blue-rectangle"></span><span style="position: relative;bottom: -260px;left: 150px;">Boys:1500</span> -->
          
          <span class="light_blue-rectangle"></span>
          <span style="position: relative; right: -150px; bottom: -30px">10</span>
          <span class="blue-rectangle"></span>
          <span style="position: relative; left: -130px">15</span>
        </div>
    </div>
    </div>
  </div>
  <script
      type="text/javascript"
      src="https://cdn.canvasjs.com/canvasjs.min.js"
    ></script>
  <script>
      // var btnContainer = document.getElementById('nav');
      window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
          title: {
            text: "",
          },
          data: [
            {
              type: "doughnut",
              dataPoints: [
                { y: 53.37, color: "rgb(77, 139, 249)" },
                { y: 35.0, color: "rgb(31, 230, 209)" },
              ],
            },
          ],

          // content: "Text 2500"
        });

        chart.render();
      };
    </script>
    <script>
      let quoteText = document.getElementById("quoteText");
      const url = "https://api.quotable.io/random?tags=motivation|success&maxLength=100";

      let getQuote = () => {
        fetch(url)
          .then((response) => response.json())
          .then((item) => {
            if (item && item.content) {
              console.log(item.content);
              const randomQuote = item.content;
              quoteText.innerText = randomQuote;

            } else {
              quoteText.innerText = "Failed to fetch a quote.";
            }
          })
          .catch((error) => {
            console.error("Error fetching quote:", error);
            quoteText.innerText = "Failed to fetch a quote.";
          });
      };

      // Call the getQuote function to fetch and display a quote
      getQuote();
    </script>
</body>
</html>