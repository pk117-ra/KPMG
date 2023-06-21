<?php
require_once "koolreport/autoload.php";
class login_analytics_kool extends \koolreport\KoolReport
{
    use \koolreport\inputs\Bindable;
    use \koolreport\inputs\POSTBinding;

    function settings()
    {
        $config = include "kool_config.php";
        return array(
            "dataSources"=>array(
                "mydata"=>$config["kpmg"]
            )
        );
    }
    
    protected function setup()
    {
    	$duration = $this->params['report'];
        if($duration == 1)
        {
            $where =" 1=1";
        }
        else if($duration == 2)
        {
            $where="  Date_format(b.LastLoginDateTime,'%Y-%m-%d')=CURRENT_DATE()";
        }
        else if($duration == 3)
        {
            $where="  Date_format(b.LastLoginDateTime,'%Y-%m-%d')=SUBDATE(CURDATE(),1)";
        }
        else if($duration == 4)
        {
            $where="  Year(b.LastLoginDateTime)=YEAR(CURRENT_DATE()) AND WEEK(b.LastLoginDateTime)=WEEK(CURRENT_DATE())";
        }
        else if($duration == 5)
        {
            $where="  Year(b.LastLoginDateTime)=YEAR(CURRENT_DATE()) AND WEEK(b.LastLoginDateTime)=(WEEK(CURRENT_DATE())-1)";
        }
        else if($duration == 6)
        {
            $where="Date_format(b.LastLoginDateTime,'%Y-%m')=(Date_format(CURRENT_DATE(),'%Y-%m'))";
        }
        else if($duration == 7)
        {
            $where="  Date_format(b.LastLoginDateTime,'%Y-%m')=(Date_format(CURRENT_DATE(),'%Y-%m')-1)";
        }
        else if($duration == 8)
        {
            $where="  QUARTER(b.LastLoginDateTime)=QUARTER(CURRENT_DATE()) AND Year(b.LastLoginDateTime)=Year(CURRENT_DATE())";
        }
        else if($duration == 9)
        {
        	if($this->params['quater']== 1)
        	{
        		$where="  QUARTER(b.LastLoginDateTime)=4 AND Year(b.LastLoginDateTime)=(Year(CURRENT_DATE())-1)";
        	}
        	else
        	{
        		$where="  QUARTER(b.LastLoginDateTime)=(QUARTER(CURRENT_DATE())-1) AND Year(b.LastLoginDateTime)=Year(CURRENT_DATE())";
        	}
            
        }
        else if($duration == 10)
        {
            $where="  Date_format(b.LastLoginDateTime,'%Y-%m-%d')>='".$this->params['from']."' AND Date_format(b.LastLoginDateTime,'%Y-%m-%d')<='".$this->params['to']."'";
        }
        $where.=" AND b.LastLoginDateTime!='' AND b.LastActivity!=''";
        
        if($this->params['partner'] !='all')
        {
            $this->src("mydata")->query("SELECT a.UserId as UserId, b.Id as id,a.UserFirstName as name,b.LastLoginDateTime as start,b.LastActivity as end1,TIMEDIFF(b.LastActivity,b.LastLoginDateTime) as diff1 FROM user_master as a left join `tone_activity_log` as b on a.UserId=b.UserId where b.UserId=".$this->params['partner']." AND ".$where." Order BY name DESC")->pipe($this->dataStore("count"));
            $this->src("mydata")->query("SELECT seC_TO_TIME(sum(TIMESTAMPDIFF(SECOND,b.LastLoginDateTime,b.LastActivity))) as diff1 FROM `tone_activity_log` as b where b.UserId=".$this->params['partner']." AND ".$where." ")->pipe($this->dataStore("count1"));
        }
        else
        {
            foreach($this->params['id'] as $key => $value) 
            {
                $this->src("mydata")->query("SELECT UserFirstName as name FROM user_master where UserId =".$value)->pipe($this->dataStore('name'));
               $this->src("mydata")->query("SELECT seC_TO_TIME(sum(TIMESTAMPDIFF(SECOND,b.LastLoginDateTime,b.LastActivity))) as diff1,COUNT(b.Id) as count FROM tone_activity_log as b where b.UserId=".$value." AND ".$where." ")->pipe($this->dataStore('data'));
            }
            $this->src("mydata")->query("SELECT seC_TO_TIME(sum(TIMESTAMPDIFF(SECOND,b.LastLoginDateTime,b.LastActivity))) as diff1 FROM `tone_activity_log` as b where 1=1 AND ".$where." ")->pipe($this->dataStore("count1"));
        }
    }
}
?>