create table if not EXISTS aut_user(
   `id` int(4) unsigned not null auto_increment,
    `user` varchar(30) not null default '' comment '用户名',
    `pwd` varchar(32) not null default '' comment '密码',
    `create_time` datetime not null,
    `userroleid` smallint(6) NOT NULL DEFAULT '1',
    `status` smallint(2) NOT NULL DEFAULT '1',
    primary key(id)
)  engine=myisam default charset=utf8;


  INSERT into aut_user
  SELECT 1,'花花',MD5('123456'),NOW(),1,3 UNION
  SELECT 2,'金凤',MD5('123456'),NOW(),1,3  



CREATE TABLE if not EXISTS aut_class( 
    id smallint(4) unsigned not null AUTO_INCREMENT COMMENT '分类表',
    title varchar(30) not null  DEFAULT '' COMMENT '分类名称',
    pid smallint(4) unsigned not null  COMMENT 'aut_classID',
    PRIMARY KEY (id)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8;

select * from aut_class




create table if not EXISTS aut_goods
(
  autid int(4) unsigned not null AUTO_INCREMENT COMMENT '文章管理Id',
  articleId SMALLINT(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT '文章类别Id',         
	artname varchar(100) not null DEFAULT '' COMMENT '文章名称',
  author VARCHAR(20) NOT NULL COMMENT '作者',                               
	price DOUBLE(10,2) unsigned not null DEFAULT 00.00 COMMENT '出版价格',
  pic varchar(200) not null DEFAULT ''COMMENT '文章封面图',
  publisher int(4) NOT NULL COMMENT '文章出版社',
  detail TEXT COMMENT '文章的介绍',
  classid int(11) NOT NULL,
  PRIMARY KEY (autid)

)ENGINE=MyISAM  DEFAULT CHARSET=utf8;


create table if not EXISTS aut_rbac_user
(
   id int(4) not null AUTO_INCREMENT COMMENT '用户表',
   username varchar(30) not null DEFAULT '' COMMENT '用户名称',
   pwd char(32) not null DEFAULT '' COMMENT '密码',
   role_id TINYINT(1) not null COMMENT '分组ID',
   PRIMARY key (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT into aut_rbac_user
  SELECT 1,'花花',MD5('123456'),1 UNION
  SELECT 2,'金凤',MD5('123456'),2 UNION
  SELECT 3,'雷雷',MD5('123456'),3  



create table if not EXISTS aut_rbac_role(
id int(4) not null AUTO_INCREMENT COMMENT '分组的id',
role_title varchar(20) not null DEFAULT '' COMMENT '角色名称',
node_id varchar(50)not null DEFAULT'' COMMENT '节点的id',
PRIMARY key (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;



create table if not EXISTS aut_rbac_node(
	 id int(4) not null AUTO_INCREMENT COMMENT '用户许可表',
	 operation varchar(50) not null DEFAULT '' COMMENT '用户操作的节点',
	 title varchar(50) not null DEFAULT '' COMMENT'操作名称',
  PRIMARY key (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
"id" => true,       // 文章编号   
        "category_id" => true, // 文章版块   
        "title" => true,    // 文章标题   
        "type" => true,     // 文章类型   
        "highlight" => true,// 高亮标题   
        "author" => true,   // 作者   
        "source" => true,   // 来源   
        "image" => true,    // 图片(1张)   
        "excerpt" => true,  // 摘要   
        "details" => true,  // 内容   
        "weight" => true,   // 排序   
        "hits" => true,     // 点击量   
        "digest" => true,   // 置顶   
        "display" => true,  // 显示   
        "modified" => true, // 修改时间   
        "created" => true,  // 添加时间   

*/