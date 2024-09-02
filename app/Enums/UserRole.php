<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case PROFESSOR = 'professor';
    case ALUNO = 'aluno';
    case VISITANTE = 'visitante';
}
