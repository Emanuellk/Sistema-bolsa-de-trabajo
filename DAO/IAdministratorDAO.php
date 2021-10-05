<?php
  namespace DAO;

  use Models\Administrator as Administrator;
  
  interface IAdministratorDAO {
    function Add(Administrator $administrator);
    function GetAll();
  }
?>