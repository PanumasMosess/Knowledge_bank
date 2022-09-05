<?
require_once("../../application.php");

$year = isset($_POST['year_']) ? $_POST['year_'] : '';

if ($year == 'ALL') {

    $str_count_target = "SELECT [knowledge_taget_dept], sum(CONVERT(int,knowledge_taget_total)) as total_
    FROM [db_knowledge_bank].[dbo].[tbl_knowledge_taget] group by [knowledge_taget_dept] ";

    $str_current = "SELECT   knowledge_dept, count(knowledge_dept) as approve_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'APPROVE'
	group by 
	knowledge_dept";
} else {

    $str_count_target = "SELECT  [knowledge_taget_dept], sum(CONVERT(int,knowledge_taget_total)) as total_
    FROM [db_knowledge_bank].[dbo].[tbl_knowledge_taget] where [knowledge_taget_year] = '$year' group by  [knowledge_taget_dept], [knowledge_taget_total] ";

    $str_current = "SELECT  knowledge_dept, count(knowledge_dept) as approve_ FROM tbl_knowledge_data 
    left join tbl_knowledge_running 
    on tbl_knowledge_data.knowledge_code = tbl_knowledge_running.knowledge_running_code
    where knowledge_running_status = 'APPROVE' and [knowledge_target_year] = '$year'
	group by 
	knowledge_dept";
}

$objQurey_approve = sqlsrv_query($db_con, $str_current);

?>
<script>
    var key_bu = [];
    var target_bu = [];
    var current = [];
    var key_val = [];
    var dept = [];
    var approve = [];
</script>
<?

while ($objResult_app = sqlsrv_fetch_array($objQurey_approve, SQLSRV_FETCH_ASSOC)) {
?>
    <script>
        dept = "<?= $objResult_app['knowledge_dept'] ?>";
        approve = "<?= $objResult_app['approve_'] ?>";
        key_val.push({
            dept,
            approve
        });
    </script>
<?
}


$objQuery = sqlsrv_query($db_con, $str_count_target);

$json = array();
while ($objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC)) {
?>
    <script>
        key_bu.push("<?= $objResult['knowledge_taget_dept'] ?>");
        target_bu.push("<?= $objResult['total_'] ?>");
    </script>

<?
}
?>

<script>
    var array_data = [];

    for (let index_out = 0; index_out < key_bu.length; index_out++) {
        var tag = 0;
        for (const [key, value] of Object.entries(key_val)) {
            if (value.dept == key_bu[index_out]) {
                array_data.push(value.approve);
                tag++;
            }
            //console.log(value.dept + " " + value.approve); 
        }
        if (tag == 0) {
            array_data.push('0');
        }
    }

    var ctx = document.getElementById("bulinechart");
    var basiclinechart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: key_bu,
            datasets: [{
                    label: "Target Knowledge",
                    fill: false,
                    backgroundColor: '#fb9678',
                    borderColor: '#fb9678',
                    data: target_bu,
                    borderWidth: 2
                },
                {
                    label: "Knowledge Approve Current",
                    fill: false,
                    backgroundColor: '#00c292',
                    borderColor: '#00c292',
                    data: array_data,
                    borderWidth: 2
                },

            ]
        },
        options: {
            elements: {
                line: {
                    tension: 0.1
                },
            },
            responsive: true,
            title: {
                display: false,
                text: 'Basic Line Chart'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'BU'
                    },
                    ticks: {
                        autoSkip: false
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Target'
                    },
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>