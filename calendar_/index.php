<?php
// 根據當月月份切換不同的圖片
if (isset($_GET['month'])) {
  $month = $_GET['month'];
} else {
  $month = date('m');
}

switch ($month) {
  case "1":
    $Bg = "jan.webp";
    break;
  case "2":
    $Bg = "feb.webp";
    break;
  case "3":
    $Bg = "mar.webp";
    break;
  case "04":
    $Bg = "apr.webp";
    break;
  case "05":
    $Bg = "may.webp";
    break;
  case "06":
    $Bg = "jun.avif";
    break;
  case "07":
    $Bg = "july.webp";
    break;
  case "08":
    $Bg = "aug.webp";
    break;
  case "09":
    $Bg = "sep.webp";
    break;
  case "10":
    $Bg = "oct.avif";
    break;
  case "11":
    $Bg = "nov.avif";
    break;
  case "12":
    $Bg = "dec.jpg";
    break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>線上萬年曆</title>
  <!-- fontawesome 連結 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css 連結 -->
  <link rel="stylesheet" href="style.css">
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php
  // 用GET接受用戶從網址列輸入的年份和月份
  if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
  } else {
    $month = date('m');
    $year = date('Y');
  }

  $thisFirstDay = date("{$year}-{$month}-1");
  $thisFirstDate = date('w', strtotime($thisFirstDay));
  $thisMonthDays = date("t");
  $thisLastDay = date("{$year}-{$month}-$thisMonthDays");
  $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7);
  $firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
  ?>

  <!-- gsap給背景動畫用的 -->
  <div id="animatedBackground"></div>

  <h1 class="header mt-3">Calendar</h1>

  <!-- 我自己原本做的navbar開始 -->
  <div class="container-fluid nav-bar">
    <div class="nav">
      <div class="form">
        <form action="check.php" method="get">
          <div class="search-box">
            <input class="form-control" type="text" placeholder="年份" name="year">
            <input class="form-control" type="text" placeholder="月份" name="month">
            <button type="submit" class="search-button">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="hi-home">
      <div class="home">
        <a href="index.php" style="display: inline-block;">HOME</a>
      </div>
    </div>
  </div>
  <!-- 我自己原本做的navbar結束 -->

  <div class="container-fluid main">
    <div class="table_tri">
      <div class="bt_left">
        <?php
        $nextYear = $year;
        $prevYear = $year;

        if (($month - 1) < 1) {
          $prev = 12;
          $prevYear = $year - 1;
        } else {
          $prev = $month - 1;
        }
        ?>
        <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">
          <i class="fa-solid fa-circle-left"></i>
        </a>

      </div>

      <div class="table_two">
        <div class="title">
          <?php
          if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            // 使用 strtotime 函數代表當年當月的第一天(即每月的1號)
            $date = strtotime("$year-$month-01");
            // 格式化日期成人類可讀的日期格式
            echo date('F Y', $date);
          } else {
            // 如果未提供 URL 參數，則使用當前年月份
            echo date('F Y');
          }
          ?>
        </div>

        <div class="table">
          <table>
            <tr class="th">
              <td style='color:red'>SUN</td>
              <td>MON</td>
              <td>TUE</td>
              <td>WED</td>
              <td>THU</td>
              <td>FRI</td>
              <td style='color:red'>SAT</td>
            </tr>


            <?php
            $today = date("Y-m-d");
            $holidays=[
              "01-01" => "元旦",
              "02-28" => "和平紀念日",
              "04-04" => "兒童節",
              "04-05" => "清明節",
              "05-01" => "勞動節",
              "10-10" => "國慶日",
              "12-25" => "聖誕節"
            ];
            $currentYear=date("Y");

            for ($i = 0; $i < $weeks; $i++) {
              echo "<tr>";
              for ($j = 0; $j < 7; $j++) {
                $addDays = 7 * $i + $j;
                $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));
                $cellDateFormatted = date("Y-m-d", $thisCellDate);
                $cellMonthDay=date("m-d", $thisCellDate); // 生成月份和日期的格式

                // 檢查是否為週末
                // if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                //   echo "<td style='color:red'>";
                // } else {
                //   echo "<td>";
                // }

                // 檢查是否為週末
                $weekendStyle = (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) ? "color:red;" : "";

                // 檢查是否為國定假日並添加樣式
                // $holidayStyle= isset($holidays[$cellMonthDay]) ? "font-size: 0.8em": "";
                $holidayText=isset($holidays[$cellMonthDay])? "</br>" . $holidays[$cellMonthDay]: "";

                // 檢查是否為今天，並以淡紫色背景凸顯
                $highlightToday = ($cellDateFormatted == $today) ? "background-color:lavender;" : "";
                echo "<td style='$weekendStyle $highlightToday'>";

                // echo "<td style='$holidayStyle'>";
                if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                  echo date("j", $thisCellDate) . $holidayText; // 顯示日期和國定假日名稱
                }
                echo "</td>";
              }
              echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
      </div>

      <div class="bt_right">
        <?php
        $nextYear = $year;
        $prevYear = $year;
        if (($month + 1) > 12) {
          $next = 1;
          $nextYear = $year + 1;
        } else {
          $next = $month + 1;
        }
        ?>

        <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">
          <i class="fa-solid fa-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="asider">
      <img src="./calendar_img/<?php echo $Bg; ?>" style="border-radius:25px; height:60vh;">
    </div>
  </div>

  <!-- <footer class="footer">
    footer
  </footer> -->




  <!-- bootstrap js  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- gsap js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

  <!-- GSAP 的 to() 方法來創建一個無限循環的背景移動動畫 -->
  <script>
    gsap.to("#animatedBackground", {
      duration: 50, // 動畫持續時間
      backgroundPosition: "200% 0", // 結束位置
      ease: "linear", // 動畫速度曲線
      repeat: -1, // 無限循環
    });
  </script>

</body>