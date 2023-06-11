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
    paciente_nit varchar(15) not null,
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
create table citas(
    cita_id serial not null,
    cita_paciente integer not null,
    cita_medico integer not null,
    cita_fecha date not null,
    cita_hora DATETIME YEAR to MINUTE NOT NULL,
    cita_referencia varchar(5) not null,
    cita_situacion smallint not null default 1,
    primary key (cita_id),
    foreign key (cita_paciente) REFERENCES pacientes (paciente_id),
    foreign key (cita_medico) REFERENCES medicos (medico_id)
)
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
