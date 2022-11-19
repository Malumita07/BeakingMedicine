create database Proyecto;
use Proyecto;

-- Tabla Persona

create table Persona(
    Id int primary key auto_increment,
    nombre varchar(30) not null,
    calle varchar(50),
    numero int,
    esquina varchar(50),
    contrasenia varchar(200) not null,
    correo varchar(50) not null
);

-- Tabla Usuario

create table Usuario(
    Id_user int primary key,
    estado int(1) not null,
    foreign key(Id_user) references Persona(Id)
);

-- Tabla Administrador

create table Administrador(
    Id_user int not null,
    nivel int not null,
    apellido varchar(30) not null,
    CI int(8) not null,
    primary key(Id_user, CI),
    foreign key(Id_user) references Persona(Id)
);

-- Tabla Proveedor

create table Proveedor(
    Id_p int primary key,
    nombre_p varchar(30) not null,
    telefono_p int not null,
    calle_p varchar(50) not null,
    numero_p int not null,
    esquina_p varchar(50) not null
);

-- Tabla Tarjeta

create table Tarjeta(
    Id_user int,
    numero_t int,
    tipo_t enum('Visa', 'Mastercard'),
    primary key(Id_user, numero_t, tipo_t),
    foreign key(Id_user) references Persona(Id)
);

-- Tabla Telefono

create table Telefono(
    Id_user int,
    telefono int,
    primary key(Id_user, telefono),
    foreign key(Id_user) references Persona(Id)
);

-- Tabla Articulos

create table Articulos(
    Cod_Art int auto_increment,
    Id_p int,
    nombre varchar(50) not null,
    descripcion varchar(200) not null,
    precio int not null,
    stock int not null,
    estado tinyint(1) not null,
    primary key(cod_Art, Id_p),
    foreign key(Id_p) references Proveedor(Id_p)
);

-- Tabla Medicamentos

create table Medicamentos(
    Cod_Med int auto_increment,
    Cod_Art int,
    especificaciones varchar(200) not null,
    receta tinyint(1) not null,
    primary key(Cod_Med, Cod_Art),
    foreign key(Cod_Art) references Articulos(Cod_Art)
);

-- Tabla Compra

create table Compra(
    Id_Com int auto_increment,
    Id_user int,
    Cod_Art int,
    forma_pago enum('Efectivo', 'PayPal', 'Tarjeta') not null,
    fecha_compra date not null,
    monto int not null,
    foto_rec varchar(50),
    primary key(Id_Com, Id_user, Cod_Art),
    foreign key(Cod_Art) references Articulos(Cod_Art),
    foreign key(Id_user) references Persona(Id)
);

-- Tabla Envios

create table Envios(
    Id_Com int primary key,
    realizado tinyint(1) not null,
    foreign key(Id_Com) references Compra(Id_Com)
);