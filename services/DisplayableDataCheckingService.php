<?php

namespace owtta\Blog\Service;

class DisplayableDataCheckingService
{
    public $displayableEmail;
    public $displayablePassword;
    public $displayableRegistrationDate;
    public $displayableEditionButtons;
    
    public function testDisplayableData($caller, $requested)
    {
        $this->displayableEmail = self::isEmailDisplayable($caller, $requested);
        $this->displayablePassword = self::isPasswordDisplayable($caller, $requested);
        $this->displayableRegistrationDate = self::isRegistrationDateDisplayable($caller, $requested);
        $this->displayableEditionButtons = self::isPasswordDisplayable($caller, $requested);
    }
    
    public static function isEmailDisplayable($caller, $requested)
    {
        switch ($caller['status'])
        {
            case 'member' :
                if ($caller['id'] === $requested['id'])
                {
                    return true;
                }
                break;
                
            case 'admin' :
                if ($requested['status'] != 'superadmin')
                {
                   return true;
                }
                break;
                
            case 'owner' :
            case 'superadmin' :
                return true;
                break;
        }
    }
    
    public static function isPasswordDisplayable($caller, $requested)
    {
        switch ($caller['status'])
        {
            case 'member' :
                if ($caller['id'] === $requested['id'])
                {
                    return true;
                }
                break;
                
            case 'admin' :
                if ($requested['status'] === 'member' || $caller['id'] === $requested['id'])
                {
                   return true;
                }
                break;
                
            case 'owner' :
                if ($requested['status'] === 'member' || $requested['status'] === 'admin' || $caller['id'] === $requested['id'])
                {
                    return true;
                }
                break;
                
            case 'superadmin':
                return true;
                break;
        }
    }
    
    public static function isRegistrationDateDisplayable($caller, $requested)
    {
        switch ($caller['status'])
        {
            case 'member' :
            case 'admin' :
                if ($requested['status'] === 'member' || $requested['status'] === 'admin')
                {
                    return true;
                }
                break;
                
            case 'owner' :
                if ($requested['status'] != 'superadmin')
                {
                    return true;
                }
                break;
                
            case 'superadmin' :
                return true;
                break;
        }
    }
}