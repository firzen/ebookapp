<?php
/**
* 读取 sql 文件并写入数据库
* @version 1.01 demo.php
*/
class DBManager
{
    var $dbHost = '';
    var $dbUser = '';
    var $dbPassword = '';
    var $dbSchema = '';

    function __construct($host,$user,$password,$schema)
    {
        $this->dbHost = $host;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $this->dbSchema = $schema;
    }

    function createFromFile($sqlPath,$delimiter = '(;/n)|((;/r/n))|(;/r)',$prefix = '',$commenter = array('#','--'))
    {
        //判断文件是否存在
        if(!file_exists($sqlPath))
            return false;

        $handle = fopen($sqlPath,'rb');  

        $sqlStr = fread($handle,filesize($sqlPath));

        //通过sql语法的语句分割符进行分割
        $segment = explode(";",trim($sqlStr));

        //var_dump($segment);

        //去掉注释和多余的空行
        foreach($segment as & $statement)
        {
            $sentence = explode("/n",$statement);

            $newStatement = array();

            foreach($sentence as $subSentence)
            {
                if('' != trim($subSentence))
                {
                    //判断是会否是注释
                    $isComment = false;
                    foreach($commenter as $comer)
                    {
                        if(eregi("^(".$comer.")",trim($subSentence)))
                        {
                            $isComment = true;
                            break;
                        }
                    }
                    //如果不是注释，则认为是sql语句
                    if(!$isComment)
                        $newStatement[] = $subSentence;                  
                }
            }

            $statement = $newStatement;
        }
        //对表名加前缀
        if('' != $prefix)
        {

      
            //只有表名在第一行出现时才有效 例如 CREATE TABLE talbeName

            $regxTable = "^[/`/'/"]{0,1}[/_a-zA-Z]+[/_a-zA-Z0-9]*[/`/'/"]{0,1}$";//处理表名的正则表达式
            $regxLeftWall = "^[/`/'/"]{1}";

            $sqlFlagTree = array(
                    "CREATE" => array(
                            "TABLE" => array(
                                    "$regxTable" => 0
                                )
                        ),
                    "INSERT" => array(
                            "INTO" => array(
                                "$regxTable" => 0
                            )
                        )

                    );

            foreach($segment as & $statement)
            {
                $tokens = split(" ",$statement[0]);

                $tableName = array();
                $this->findTableName($sqlFlagTree,$tokens,0,$tableName);

                if(empty($tableName['leftWall']))
                {
                    $newTableName = $prefix.$tableName['name'];
                }
                else{
                    $newTableName = $tableName['leftWall'].$prefix.substr($tableName['name'],1);
                }

                $statement[0] = str_replace($tableName['name'],$newTableName,$statement[0]);
            }

        }      
        //组合sql语句
        foreach($segment as & $statement)
        {
            $newStmt = '';
            foreach($statement as $sentence)
            {
                $newStmt = $newStmt.trim($sentence)."/n";
            }

            $statement = $newStmt;
        }

        //用于测试------------------------      
        //var_dump($segment);
        //writeArrayToFile('data.txt',$segment);
        //-------------------------------

        self::saveByQuery($segment);

        return true;
    }

    private function saveByQuery($sqlArray)
    {
        $conn = mysql_connect($this->dbHost,$this->dbUser,$this->dbPassword);

        mysql_select_db($this->dbSchema);

        foreach($sqlArray as $sql)
        {
            mysql_query($sql);
        }      
        mysql_close($conn);
    }

    private function findTableName($sqlFlagTree,$tokens,$tokensKey=0,& $tableName = array())
    {
        $regxLeftWall = "^[/`/'/"]{1}";

        if(count($tokens)<=$tokensKey)
            return false;      

        if('' == trim($tokens[$tokensKey]))
        {
            return self::findTableName($sqlFlagTree,$tokens,$tokensKey+1,$tableName);
        }
        else
        {
            foreach($sqlFlagTree as $flag => $v)
            {  
                if(eregi($flag,$tokens[$tokensKey]))
                {
                    if(0==$v)
                    {
                        $tableName['name'] = $tokens[$tokensKey];

                        if(eregi($regxLeftWall,$tableName['name']))
                        {
                            $tableName['leftWall'] = $tableName['name']{0};
                        }

                        return true;
                    }
                    else{
                        return self::findTableName($v,$tokens,$tokensKey+1,& $tableName);
                    }
                }
            }
        }

        return false;
    }
}

?>