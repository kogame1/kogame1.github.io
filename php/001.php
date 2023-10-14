<?php

include 'lib.php';

$total = 312; 

$limit = 10; 

$page_limit = 5;

$page = isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page']) ? $_GET['page'] : 1;

/* total 게시물 총 개수
 
 * limit 한 화면 출력 개수 
 
 * page_limit 하단에 출력되는 페이지수 << 1 2 3 4 5 >>
 
 * page 현재 몇번째 페이지인지.
// 'page' 값이 null이 아닌지 && 'page'가 빈칸이 아닌지 && 'page가 숫자형 데이터인지 ? 맞으면 $page에 $_GET['page']를 넣고 아니면 1을 넣음
// 1,2,3, '112', '1' 등은 ture가 됨. '1a'등은 false가 됨.  

ffff
*/


echo "<table>";

    foreach($rs as $row) {
        print_r($row);
        exit;

        echo "
            <tr>
                // <td>".$row['idx']."</td>
                // <td>".$row['subject']."</td>
                // <td>".$row['author']."</td>
                // <td>".$row['rdate']."</td>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
            </tr>
        ";
    }

echo "</table>";


$rt_str = my_pagination($total, $limit, $page_limit, $page);

echo $rt_str;
