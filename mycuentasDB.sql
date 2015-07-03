create table cat_ingresos(
	int_ingreso int not null auto_increment,
	str_ingreso varchar(200) not null,
	primary key (int_ingreso)
)engine = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table cat_egresos(
	int_egreso int not null auto_increment,
	str_egreso varchar(200) not null,
	primary key (int_egreso)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table cat_bancos(
	int_banco int not null auto_increment,
	str_banco varchar(200) not null,
	primary key (int_banco)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table cat_cuentas(
	int_cuenta int not null auto_increment,
    int_banco int not null,
    str_cuenta varchar(200),
    foreign key (int_banco) references cat_bancos(int_banco),
    primary key (int_cuenta)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table cat_menus(
	int_menu int not null auto_increment,
    str_menu varchar(200) not null,
    primary key (int_menu)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_usuarios(
	int_usuario int not null auto_increment,
    str_usuario varchar(200) not null,
    str_username varchar(16) not null,
    str_clave varchar(200) not null,
    primary key (int_usuario)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_permisos(
	int_menu int not null,
    int_usuario int not null,
    foreign key (int_menu) references cat_menus(int_menu),
    foreign key (int_usuario) references tbl_usuarios(int_usuario),
    primary key (int_menu, int_usuario)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_ingresos(
	int_ingreso int not null auto_increment,
    int_cat_ingreso int not null,
    int_cat_cuenta int not null,
    dbl_monto double(16,2) not null,
    dat_fecha_registro date not null,
    int_usuario int not null,
    foreign key (int_cat_ingreso) references cat_ingresos(int_ingreso),
    foreign key (int_cat_cuenta) references cat_cuentas(int_cuenta),
    foreign key (int_usuario) references tbl_usuarios (int_usuario),
    primary key (int_ingreso)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_egresos(
	int_egreso int not null auto_increment,
    int_cat_egreso int not null,
    int_cat_cuenta int not null,
    dbl_monto double(16,2) not null,
    dat_fecha_registro date not null,
    int_usuario int not null,
    foreign key (int_cat_egreso) references cat_egresos(int_egreso),
    foreign key (int_cat_cuenta) references cat_cuentas(int_cuenta),
    foreign key (int_usuario) references tbl_usuarios(int_usuario),
    primary key (int_egreso)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_ahorros(
	int_ahorro int not null auto_increment,
    str_ahorro varchar (200) not null,
    dbl_monto double(16,2) not null,
    dat_fecha_registro date not null,
    int_usuario int not null,
    foreign key (int_usuario) references tbl_usuarios(int_usuario),
    primary key (int_ahorro)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

create table tbl_pagos(
	int_pago int not null auto_increment,
	int_egreso int not null,
	int_cuenta int not null,
	dbl_monto double(16,8) not null,
	dat_fecha_registro date not null,
	foreign key (int_egreso) references tbl_egresos(int_egreso),
	foreign key (int_cuenta) references cat_cuentas(int_cuenta),
	primary key (int_pago)
)engine = innodb DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;