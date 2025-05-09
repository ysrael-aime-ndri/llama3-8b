<?php

namespace Epaphrodites\database\requests\mainRequest\delete;

use Epaphrodites\database\requests\typeRequest\sqlRequest\delete\delete as DeleteDelete;

final class delete extends DeleteDelete
{

    /**
     * Request to delete users right by @id
     * 
     * @param int $idRights
     * @return bool
    */
    public function DeletedUsersRights(
        string $idRights,
        int $usersGroup
    ):bool{

        if(static::initConfig()['delright']->DeletedUsersRights($idRights) == true){

            $config = static::initQuery()['setting'];
            $actions = " Delete this users group rights : " . static::initNamespace()['datas']->usersGroup($usersGroup, 'label');
    
            match (_FIRST_DRIVER_) {
    
              'mongodb' => $config->noSqlActionsRecente($actions),
              'redis' => $config->noSqlRedisActionsRecente($actions),
        
              default => $config->ActionsRecente($actions),
            };

            return true;
        }

        return false;
    }

    /**
     * Request to delete users right by @id
     * 
     * @param int $usersGroup
     * @return bool
    */
    public function EmptyAllUsersRights(
        int $usersGroup
    ):bool{


        if(static::initConfig()['delright']->EmptyAllUsersRight($usersGroup) == true){

            $config = static::initQuery()['setting'];
            $actions = " Delete all this users group rights : " . static::initNamespace()['datas']->usersGroup($usersGroup, 'label');
    
            match (_FIRST_DRIVER_) {
    
              'mongodb' => $config->noSqlActionsRecente($actions),
              'redis' => $config->noSqlRedisActionsRecente($actions),
        
              default => $config->ActionsRecente($actions),
            };

            return true;
        }

        return false;
    }    

}