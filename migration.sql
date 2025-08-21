
   INFO  Running migrations.  

  2025_08_21_031202_add_status_to_blogs_portfolios_products ............................................................................ 5.90ms FAIL

In Connection.php line 824:
                                                                                                                                                                                                   
  SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name 'status' (Connection: mysql, SQL: alter table `blogs` add `status` enum('draft', 'published', 'archive') not null default 'd  
  raft' after `slug`)                                                                                                                                                                              
                                                                                                                                                                                                   

In Connection.php line 570:
                                                                               
  SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name 'status'  
                                                                               

