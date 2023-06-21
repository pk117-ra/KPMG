<?php
    use \koolreport\widgets\google\PieChart;
    use \koolreport\datagrid\DataTables;
    $count =$this->dataStore("count1")->data();
?>
<style type="text/css">
    .table th, .table td {
    padding: 0.5rem 0.1rem;
    border: 1px solid #000;
}
.table th{
    color:#0e0e0e;
    background-color: #ffffff;
}
</style>
<div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-4" style="border:2px black; font-weight: bold;font-size: 20px; background-color: #6f42c1;color:#fff;border-radius:10px;text-align: center;padding: 8px;">Total Time : <?= $count[0]['diff1']; ?></div>
</div>
<?php 
    $name = $this->dataStore("name")->data();
    $data = $this->dataStore("data")->data();
    $tab= array();
    if($this->params['partner']=='all')
    {
        foreach ($name as $key => $value) 
        {
            $temp=array();
            $temp['name']=$value['name'];
            $temp['count']=$data[$key]['count'];
            if($data[$key]['diff1']!='')
            {
                $temp['diff1']=$data[$key]['diff1'];
            }
            else
            {
                $temp['diff1']="00:00:00";  
            }
            array_push($tab,$temp);
        }
    }
?>
 <div class="row">
    <div class="col-md-12 table-responsive">
         <?php
        
         if($this->params['partner']=='all')
         {
            DataTables::create(array(
                "dataStore"=>$tab,
                "columns"=>array(
                    "name"=>array(
                        "label"=>"User",
                    ),
                    "count"=>array(
                        "label"=>"Login Count",
                    ),
                    "diff1"=>array(
                        "label"=>"Total Time",
                    ),
                ),
                "cssClass"=>array(
                    "table"=>"table table-striped table-bordered"
                ),
                "options"=>array(
                    "searching"=>true,
                    "paging"=>true,
                    "order"=>array(
                        array(2,"desc") //Sort by first column desc
                    ),
                ),
            ));
         }
         else
         {
            DataTables::create(array(
                "dataStore"=>$this->dataStore("count"),
                "columns"=>array(
                    "id"=>array(
                        "label"=>"Id"
                    ),
                    "name"=>array(
                        "label"=>"Name",
                    ),
                    "start"=>array(
                        "label"=>"Login Time",
                    ),
                    "end1"=>array(
                        "label"=>"Logout Time",
                    ),
                    "diff1"=>array(
                        "label"=>"Active In",
                    ),
                ),
                "cssClass"=>array(
                    "table"=>"table table-striped table-bordered"
                ),
                "options"=>array(
                    "searching"=>true,
                    "paging"=>true,
                    "order"=>array(
                        array(1,"desc") //Sort by first column desc
                    ),
                ),
            ));
         }
            
        ?> 
    </div>
</div> 