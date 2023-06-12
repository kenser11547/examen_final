create table especialidades(
    especialidad_id serial not null,
    especialidad_nombre varchar(50) not null,
    especialidad_situacion smallint not null default 1,
    primary key (especialidad_id)
)
create table clinicas(
    clinica_id serial not null,
    clinica_nombre varchar(50) not null,
    clinica_situacion smallint not null default 1,
    primary key (clinica_id)
)
create table pacientes(
    paciente_id serial not null,
    paciente_nombre varchar(50) not null,
    paciente_dpi varchar(15) not null,
    paciente_telefono varchar(15) not null,
    paciente_situacion smallint not null default 1,
    primary key (paciente_id)
)
create table medicos(
    medico_id serial not null,
    medico_nombre varchar(50) not null,
    medico_especialidad integer not null,
    medico_clinica integer not null,
    medico_situacion smallint not null default 1,
    primary key (medico_id),
    foreign key (medico_especialidad) REFERENCES especialidades (especialidad_id),
    foreign key (medico_clinica) REFERENCES clinicas (clinica_id)
)
CREATE TABLE citas (
    cita_id SERIAL NOT NULL,
    cita_paciente INTEGER NOT NULL,
    cita_medico INTEGER NOT NULL,
    cita_fecha DATE NOT NULL,
    cita_hora INTERVAL HOUR TO MINUTE NOT NULL,
    cita_referencia VARCHAR(5) NOT NULL,
    cita_situacion SMALLINT NOT NULL DEFAULT 1,
    PRIMARY KEY (cita_id),
    FOREIGN KEY (cita_paciente) REFERENCES pacientes (paciente_id),
    FOREIGN KEY (cita_medico) REFERENCES medicos (medico_id)
);
create table recetas(
    receta_id serial not null,
    receta_cita integer not null,
    receta_medicamentos varchar(50) not null,
    receta_situacion smallint not null default 1,
    primary key (receta_id),
    foreign key (receta_cita) REFERENCES citas (cita_id)
)
create table diagnosticos(
    diagnostico_id serial not null,
    diagnostico_cita integer not null,
    diagnostico_descripcion varchar(100) not null,
    diagnostico_situacion smallint not null default 1,
    primary key (diagnostico_id),
    foreign key (diagnostico_cita) REFERENCES citas (cita_id)
)
create table detalles(
    detalle_id serial not null,
    detalle_cita integer not null,
    detalle_paciente integer not null,
    detalle_medico integer not null,
    detalle_situacion smallint not null default 1,
    primary key (detalle_id),
    foreign key (detalle_cita) REFERENCES citas (cita_id),
    foreign key (detalle_paciente) REFERENCES pacientes (paciente_id),
    foreign key (detalle_medico) REFERENCES medicos (medico_id)
)
