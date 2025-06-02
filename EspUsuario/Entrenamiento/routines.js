// routines.js
document.addEventListener('DOMContentLoaded', () => {
  let selectedGender = 'hombre';
  let selectedLevel = 'beginner';
  let initialGoal = null; // Variable para almacenar el objetivo inicial si lo hay

  // 1) Definimos sólo 'hombre' inicialmente
  const routines = {
    hombre: {
      hipertrofia: {
        title: 'Hipertrofia',
        advice: 'Para hipertrofia, descansa 1-2 min entre series y controla la fase excéntrica.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Flexiones en pared',       sets: 3, reps: '10-12' },
              { name: 'Sentadilla con silla',     sets: 3, reps: '12-15' },
              { name: 'Remo invertido',           sets: 3, reps: '8-10' },
              { name: 'Press hombros con botella', sets: 3, reps: '12'    },
              { name: 'Curl bíceps con banda',    sets: 3, reps: '15'    },
              { name: 'Puente de glúteos',        sets: 3, reps: '15'    },
              { name: 'Plancha frontal',          sets: 3, reps: '30s'   },
              { name: 'Peso muerto con mancuerna', sets: 3, reps: '10'    }
            ]
          },
          advanced: {
            exercises: [
              { name: 'Press banca con barra',    sets: 4, reps: '8-10' },
              { name: 'Sentadilla trasera',       sets: 4, reps: '8-10' },
              { name: 'Remo con barra',           sets: 4, reps: '8-10' },
              { name: 'Press militar de pie',     sets: 4, reps: '8-10' },
              { name: 'Curl bíceps con barra',    sets: 4, reps: '10-12' },
              { name: 'Peso muerto rumano',       sets: 4, reps: '8-10'  },
              { name: 'Fondos en paralelas',      sets: 4, reps: '8-10'  },
              { name: 'Zancadas caminando',       sets: 4, reps: '12-15' },
              { name: 'Elevación piernas colgado', sets: 4, reps: '12-15' },
              { name: 'Remo con cable sentado',   sets: 3, reps: '10-12'},
              { name: 'Extensiones de tríceps por encima de la cabeza con mancuerna', sets: 3, reps: '10-12'}
            ]
          }
        }
      },
      'perdida-grasa': {
        title: 'Pérdida de Grasa',
        advice: 'Mantén ritmo elevado y descansos cortos (30-45 s).',
        levels: {
          beginner: {
            exercises: [
              { name: 'Marcha en el sitio',     sets: 3, reps: '1 min' },
              { name: 'Sentadilla corporal',    sets: 3, reps: '15'    },
              { name: 'Burpees modificados',    sets: 3, reps: '8'     },
              { name: 'Mountain climbers',      sets: 3, reps: '30s'   },
              { name: 'Plancha lateral',        sets: 3, reps: '30s'   },
              { name: 'Step sobre escalón',     sets: 3, reps: '12'    },
              { name: 'Jumping jacks suaves',   sets: 3, reps: '30s'   },
              { name: 'Puente de glúteos',      sets: 3, reps: '15'    },
              { name: 'Elevación de rodillas al pecho', sets: 3, reps: '40s'},
              { name: 'Sentadilla con salto (sin peso)', sets: 3, reps: '10-12'}
            ]
          },
          advanced: {
            exercises: [
              { name: 'HIIT (circuito 20 min)', sets: '–', reps: '–'      },
              { name: 'Burpees completos',      sets: 4, reps: '12'    },
              { name: 'Mountain climbers',      sets: 4, reps: '45s'   },
              { name: 'Saltos con comba',       sets: 4, reps: '2 min' },
              { name: 'Sprints en sitio',       sets: 5, reps: '20s'   },
              { name: 'Box jumps',              sets: 4, reps: '10'    },
              { name: 'Plancha frontal',        sets: 4, reps: '45s'   },
              { name: 'Russian twists',         sets: 3, reps: '20'    },
              { name: 'Swing con Kettlebell',   sets: 4, reps: '15'},
              { name: 'Caminata de granjero',   sets: 3, reps: '40m'}
            ]
          }
        }
      },
      crossfit: {
        title: 'CrossFit',
        advice: 'Calienta bien y mantén la técnica en cada WOD.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Fran (simplificado)',    sets: '21-15-9', reps: 'Thrusters/Burpees' },
              { name: 'Cindy (AMRAP 10 min)',   sets: '–', reps: '5 Pull-ups/10 Push-ups/15 Squats' },
              { name: 'Peso muerto ligero',     sets: 3, reps: '8'       },
              { name: 'Kettlebell deadlift',    sets: 3, reps: '10'      },
              { name: 'Wall ball suave',        sets: 3, reps: '10'      },
              { name: 'Box step-up',            sets: 3, reps: '12'      },
              { name: 'Remo en máquina',        sets: 3, reps: '500 m'     },
              { name: 'Plancha dinámica',       sets: 3, reps: '30s'       },
              { name: 'Sentadilla aérea',       sets: 3, reps: '15-20'},
              { name: 'Flexiones de rodillas',  sets: 3, reps: '10-12'}
            ]
          },
          advanced: {
            exercises: [
              { name: 'Fran (21-15-9)',         sets: '–', reps: 'Thrusters/Pull-ups' },
              { name: 'Cindy (AMRAP 20 min)',   sets: '–', reps: '5 Pull-ups/10 Push-ups/15 Squats' },
              { name: 'Deadlift pesado',        sets: 5, reps: '5'       },
              { name: 'Snatch',                 sets: 4, reps: '6'       },
              { name: 'Clean & jerk',           sets: 4, reps: '6'       },
              { name: 'Box jumps alto',         sets: 4, reps: '12'      },
              { name: 'Muscle-up progresión',   sets: 3, reps: 'máx.'      },
              { name: 'Toes to bar',            sets: 4, reps: '10'      },
              { name: 'Handstand Push-ups',     sets: 3, reps: 'máx.'},
              { name: 'GHD Sit-ups',            sets: 3, reps: '15'}
            ]
          }
        }
      },
      calistenia: {
        title: 'Calistenia',
        advice: 'Controla la postura y progresa antes de añadir carga.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Flexiones rodillas',      sets: 3, reps: '12'  },
              { name: 'Dominadas asistidas',     sets: 3, reps: 'máx.'},
              { name: 'Sentadilla corporal',     sets: 3, reps: '15'  },
              { name: 'Dips en banco',           sets: 3, reps: '12'  },
              { name: 'Sentadilla pistol asistida', sets: 3, reps: '6' },
              { name: 'Remo invertido',          sets: 3, reps: '10'  },
              { name: 'Planchas',                sets: 3, reps: '30s' },
              { name: 'Puente de glúteos',       sets: 3, reps: '15'  },
              { name: 'Zancadas sin peso',       sets: 3, reps: '10-12 (por pierna)'},
              { name: 'Elevaciones de pantorrillas', sets: 3, reps: '15-20'}
            ]
          },
          advanced: {
            exercises: [
              { name: 'Flexiones estándar',      sets: 4, reps: '15' },
              { name: 'Dominadas estrictas',     sets: 4, reps: 'máx.'},
              { name: 'Dips en paralelas',      sets: 4, reps: '12' },
              { name: 'Pistol squat',            sets: 4, reps: '8'   },
              { name: 'L-sit',                   sets: 3, reps: '20s'},
              { name: 'Muscle-up progresión',    sets: 3, reps: 'máx.'},
              { name: 'Archer push-ups',         sets: 3, reps: '8'   },
              { name: 'Elevación piernas colgado', sets: 4, reps: '10' },
              { name: 'Flexiones a una mano',    sets: 3, reps: '3-5 (por lado)'},
              { name: 'Dominadas con una mano (negativas)', sets: 3, reps: '3-5'}
            ]
          }
        }
      },
      ppl: {
        title: 'PPL (Push/Pull/Legs)',
        advice: 'Esquema semanal: P1/P4→Push; P2/P5→Pull; P3/P6→Legs; D7 descanso.',
        levels: {
          beginner: {
            schedule: {
              day1: [ // Push
                { name: 'Press pecho con mancuerna', sets: 3, reps: '12' },
                { name: 'Press militar sentado',     sets: 3, reps: '10' },
                { name: 'Fondos asistidos',          sets: 3, reps: '8-10' },
                { name: 'Elevaciones laterales',     sets: 3, reps: '12' },
                { name: 'Flexiones en pared',        sets: 3, reps: '10-12' },
                { name: 'Curl tríceps francés',      sets: 3, reps: '12' },
                { name: 'Press hombros con banda',   sets: 3, reps: '15' }
              ],
              day2: [ // Pull
                { name: 'Remo con mancuerna',      sets: 3, reps: '12' },
                { name: 'Pull-ups asistidas',      sets: 3, reps: 'máx.' },
                { name: 'Curl bíceps banda',       sets: 3, reps: '15' },
                { name: 'Face pulls',              sets: 3, reps: '15' },
                { name: 'Remo en máquina',         sets: 3, reps: '500 m' },
                { name: 'Curl martillo',           sets: 3, reps: '12' },
                { name: 'Plancha frontal',         sets: 3, reps: '30s' }
              ],
              day3: [ // Legs
                { name: 'Sentadilla goblet',        sets: 3, reps: '12' },
                { name: 'Peso muerto rumano',      sets: 3, reps: '10' },
                { name: 'Zancadas estáticas',      sets: 3, reps: '12 (por pierna)' },
                { name: 'Puente de glúteos',       sets: 3, reps: '15' },
                { name: 'Elevación talones',       sets: 3, reps: '15' },
                { name: 'Plancha lateral',         sets: 3, reps: '30s (por lado)' },
                { name: 'Ab-wheel modificado',     sets: 3, reps: '10' }
              ],
              day4: [ // Push (copia de day1)
                { name: 'Press pecho con mancuerna', sets: 3, reps: '12' },
                { name: 'Press militar sentado',     sets: 3, reps: '10' },
                { name: 'Fondos asistidos',          sets: 3, reps: '8-10' },
                { name: 'Elevaciones laterales',     sets: 3, reps: '12' },
                { name: 'Flexiones en pared',        sets: 3, reps: '10-12' },
                { name: 'Curl tríceps francés',      sets: 3, reps: '12' },
                { name: 'Press hombros con banda',   sets: 3, reps: '15' }
              ],
              day5: [ // Pull (copia de day2)
                { name: 'Remo con mancuerna',      sets: 3, reps: '12' },
                { name: 'Pull-ups asistidas',      sets: 3, reps: 'máx.' },
                { name: 'Curl bíceps banda',       sets: 3, reps: '15' },
                { name: 'Face pulls',              sets: 3, reps: '15' },
                { name: 'Remo en máquina',         sets: 3, reps: '500 m' },
                { name: 'Curl martillo',           sets: 3, reps: '12' },
                { name: 'Plancha frontal',         sets: 3, reps: '30s' }
              ],
              day6: [ // Legs (copia de day3)
                { name: 'Sentadilla goblet',        sets: 3, reps: '12' },
                { name: 'Peso muerto rumano',      sets: 3, reps: '10' },
                { name: 'Zancadas estáticas',      sets: 3, reps: '12 (por pierna)' },
                { name: 'Puente de glúteos',       sets: 3, reps: '15' },
                { name: 'Elevación talones',       sets: 3, reps: '15' },
                { name: 'Plancha lateral',         sets: 3, reps: '30s (por lado)' },
                { name: 'Ab-wheel modificado',     sets: 3, reps: '10' }
              ]
            }
          },
          advanced: {
            schedule: {
              day1: [ // Push
                { name: 'Press banca con barra',    sets: 4, reps: '8-10' },
                { name: 'Fondos en paralelas',      sets: 4, reps: '8-10' },
                { name: 'Press militar con barra',  sets: 4, reps: '8-10' },
                { name: 'Elevaciones laterales',    sets: 3, reps: '12-15' },
                { name: 'Push-ups con peso',        sets: 3, reps: '8-10' },
                { name: 'Extensión tríceps polea',  sets: 3, reps: '12-15' },
                { name: 'Flexiones diamante',       sets: 3, reps: '12' },
                { name: 'Press francés con barra Z', sets: 3, reps: '10-12'},
                { name: 'Aperturas con mancuernas', sets: 3, reps: '12-15'}
              ],
              day2: [ // Pull
                { name: 'Peso muerto', sets: 4, reps: '5-8'},
                { name: 'Dominadas', sets: 4, reps: 'máx.'},
                { name: 'Remo con barra', sets: 4, reps: '8-10'},
                { name: 'Face Pulls', sets: 3, reps: '12-15'},
                { name: 'Curl de bíceps con barra', sets: 3, reps: '10-12'},
                { name: 'Remo en T-bar', sets: 3, reps: '10-12'},
                { name: 'Encogimientos de hombros con mancuernas', sets: 3, reps: '15-20'},
                { name: 'Curl de martillo con mancuernas', sets: 3, reps: '10-12'}
              ],
              day3: [ // Legs
                { name: 'Sentadilla trasera con barra', sets: 4, reps: '8-10'},
                { name: 'Prensa de piernas', sets: 3, reps: '10-12'},
                { name: 'Peso muerto rumano con barra', sets: 3, reps: '10-12'},
                { name: 'Extensiones de cuádriceps', sets: 3, reps: '12-15'},
                { name: 'Curl femoral tumbado', sets: 3, reps: '12-15'},
                { name: 'Zancadas con barra', sets: 3, reps: '10-12 (por pierna)'},
                { name: 'Elevación de talones de pie', sets: 4, reps: '15-20'},
                { name: 'Glute bridge con barra', sets: 3, reps: '12-15'}
              ],
              day4: [ // Push (copia day1 advanced)
                { name: 'Press banca con barra',    sets: 4, reps: '8-10' },
                { name: 'Fondos en paralelas',      sets: 4, reps: '8-10' },
                { name: 'Press militar con barra',  sets: 4, reps: '8-10' },
                { name: 'Elevaciones laterales',    sets: 3, reps: '12-15' },
                { name: 'Push-ups con peso',        sets: 3, reps: '8-10' },
                { name: 'Extensión tríceps polea',  sets: 3, reps: '12-15' },
                { name: 'Flexiones diamante',       sets: 3, reps: '12' },
                { name: 'Press francés con barra Z', sets: 3, reps: '10-12'},
                { name: 'Aperturas con mancuernas', sets: 3, reps: '12-15'}
              ],
              day5: [ // Pull (copia day2 advanced)
                { name: 'Peso muerto', sets: 4, reps: '5-8'},
                { name: 'Dominadas', sets: 4, reps: 'máx.'},
                { name: 'Remo con barra', sets: 4, reps: '8-10'},
                { name: 'Face Pulls', sets: 3, reps: '12-15'},
                { name: 'Curl de bíceps con barra', sets: 3, reps: '10-12'},
                { name: 'Remo en T-bar', sets: 3, reps: '10-12'},
                { name: 'Encogimientos de hombros con mancuernas', sets: 3, reps: '15-20'},
                { name: 'Curl de martillo con mancuernas', sets: 3, reps: '10-12'}
              ],
              day6: [ // Legs (copia day3 advanced)
                { name: 'Sentadilla trasera con barra', sets: 4, reps: '8-10'},
                { name: 'Prensa de piernas', sets: 3, reps: '10-12'},
                { name: 'Peso muerto rumano con barra', sets: 3, reps: '10-12'},
                { name: 'Extensiones de cuádriceps', sets: 3, reps: '12-15'},
                { name: 'Curl femoral tumbado', sets: 3, reps: '12-15'},
                { name: 'Zancadas con barra', sets: 3, reps: '10-12 (por pierna)'},
                { name: 'Elevación de talones de pie', sets: 4, reps: '15-20'},
                { name: 'Glute bridge con barra', sets: 3, reps: '12-15'}
              ]
            }
          }
        }
      },
      arnold: {
        title: 'Arnold Split',
        advice: '6 días: 1&4 Pecho/Espalda; 2&5 Hombro/Bíceps/Tríceps; 3&6 Pierna.',
        levels: {
          beginner: {
            schedule: {
              day1: [ // Pecho/Espalda
                { name: 'Press banca con mancuernas',        sets: 3, reps: '12' },
                { name: 'Remo con mancuerna (un brazo)',    sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Press inclinado con mancuernas',  sets: 3, reps: '12' },
                { name: 'Jalones al pecho en máquina',      sets: 3, reps: '12' },
                { name: 'Aperturas con mancuernas en banco plano', sets: 3, reps: '15'},
                { name: 'Pull-over con mancuerna', sets: 3, reps: '12'}
              ],
              day2: [ // Hombro/Bíceps/Tríceps
                { name: 'Press militar sentado con mancuernas', sets: 3, reps: '12' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl de bíceps con mancuernas',      sets: 3, reps: '15' },
                { name: 'Fondos de tríceps en banco',  sets: 3, reps: '12' },
                { name: 'Elevaciones frontales con mancuernas', sets: 3, reps: '12'},
                { name: 'Pájaro con mancuernas', sets: 3, reps: '15'},
                { name: 'Curl concentrado', sets: 3, reps: '10-12 (por brazo)'},
                { name: 'Extensiones de tríceps por encima de la cabeza con una mancuerna', sets: 3, reps: '12-15'}
              ],
              day3: [ // Pierna
                { name: 'Sentadilla goblet',        sets: 3, reps: '12' },
                { name: 'Peso muerto rumano con mancuernas', sets: 3, reps: '10' },
                { name: 'Zancadas con mancuernas',  sets: 3, reps: '12 (por pierna)' },
                { name: 'Elevación de gemelos de pie', sets: 3, reps: '15' },
                { name: 'Extensiones de cuádriceps en máquina', sets: 3, reps: '15'},
                { name: 'Curl femoral sentado en máquina', sets: 3, reps: '15'},
                { name: 'Puente de glúteos', sets: 3, reps: '15'}
              ],
              day4: [ // Pecho/Espalda (copia day1)
                { name: 'Press banca con mancuernas',        sets: 3, reps: '12' },
                { name: 'Remo con mancuerna (un brazo)',    sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Press inclinado con mancuernas',  sets: 3, reps: '12' },
                { name: 'Jalones al pecho en máquina',      sets: 3, reps: '12' },
                { name: 'Aperturas con mancuernas en banco plano', sets: 3, reps: '15'},
                { name: 'Pull-over con mancuerna', sets: 3, reps: '12'}
              ],
              day5: [ // Hombro/Bíceps/Tríceps (copia day2)
                { name: 'Press militar sentado con mancuernas', sets: 3, reps: '12' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl de bíceps con mancuernas',      sets: 3, reps: '15' },
                { name: 'Fondos de tríceps en banco',  sets: 3, reps: '12' },
                { name: 'Elevaciones frontales con mancuernas', sets: 3, reps: '12'},
                { name: 'Pájaro con mancuernas', sets: 3, reps: '15'},
                { name: 'Curl concentrado', sets: 3, reps: '10-12 (por brazo)'},
                { name: 'Extensiones de tríceps por encima de la cabeza con una mancuerna', sets: 3, reps: '12-15'}
              ],
              day6: [ // Pierna (copia day3)
                { name: 'Sentadilla goblet',        sets: 3, reps: '12' },
                { name: 'Peso muerto rumano con mancuernas', sets: 3, reps: '10' },
                { name: 'Zancadas con mancuernas',  sets: 3, reps: '12 (por pierna)' },
                { name: 'Elevación de gemelos de pie', sets: 3, reps: '15' },
                { name: 'Extensiones de cuádriceps en máquina', sets: 3, reps: '15'},
                { name: 'Curl femoral sentado en máquina', sets: 3, reps: '15'},
                { name: 'Puente de glúteos', sets: 3, reps: '15'}
              ]
            }
          },
          advanced: {
            schedule: {
              day1: [ // Pecho/Espalda
                { name: 'Press de banca con barra', sets: 4, reps: '6-8'},
                { name: 'Remo con barra', sets: 4, reps: '6-8'},
                { name: 'Press de banca inclinado con barra', sets: 3, reps: '8-10'},
                { name: 'Dominadas lastradas', sets: 3, reps: 'máx.'},
                { name: 'Aperturas en máquina Peck Deck', sets: 3, reps: '12-15'},
                { name: 'Remo sentado en cable', sets: 3, reps: '10-12'}
              ],
              day2: [ // Hombro/Bíceps/Tríceps
                { name: 'Press militar con barra (de pie)', sets: 4, reps: '6-8'},
                { name: 'Elevaciones laterales con cable', sets: 3, reps: '12-15'},
                { name: 'Curl de bíceps con barra Z', sets: 3, reps: '8-10'},
                { name: 'Extensiones de tríceps con cable (agarre cuerda)', sets: 3, reps: '12-15'},
                { name: 'Press Arnold', sets: 3, reps: '10-12'},
                { name: 'Pájaros en banco inclinado', sets: 3, reps: '12-15'},
                { name: 'Curl con barra de agarre invertido', sets: 3, reps: '10-12'},
                { name: 'Dips en paralelas con peso', sets: 3, reps: '8-10'}
              ],
              day3: [ // Pierna
                { name: 'Sentadilla con barra', sets: 4, reps: '6-8'},
                { name: 'Peso muerto rumano con barra', sets: 4, reps: '8-10'},
                { name: 'Prensa de piernas', sets: 3, reps: '10-12'},
                { name: 'Extensiones de cuádriceps', sets: 3, reps: '15-20'},
                { name: 'Curl femoral tumbado', sets: 3, reps: '15-20'},
                { name: 'Zancadas búlgaras con mancuernas', sets: 3, reps: '10-12 (por pierna)'},
                { name: 'Elevación de gemelos de pie', sets: 4, reps: '15-20'}
              ],
              day4: [ // Pecho/Espalda (copia day1 advanced)
                { name: 'Press de banca con barra', sets: 4, reps: '6-8'},
                { name: 'Remo con barra', sets: 4, reps: '6-8'},
                { name: 'Press de banca inclinado con barra', sets: 3, reps: '8-10'},
                { name: 'Dominadas lastradas', sets: 3, reps: 'máx.'},
                { name: 'Aperturas en máquina Peck Deck', sets: 3, reps: '12-15'},
                { name: 'Remo sentado en cable', sets: 3, reps: '10-12'}
              ],
              day5: [ // Hombro/Bíceps/Tríceps (copia day2 advanced)
                { name: 'Press militar con barra (de pie)', sets: 4, reps: '6-8'},
                { name: 'Elevaciones laterales con cable', sets: 3, reps: '12-15'},
                { name: 'Curl de bíceps con barra Z', sets: 3, reps: '8-10'},
                { name: 'Extensiones de tríceps con cable (agarre cuerda)', sets: 3, reps: '12-15'},
                { name: 'Press Arnold', sets: 3, reps: '10-12'},
                { name: 'Pájaros en banco inclinado', sets: 3, reps: '12-15'},
                { name: 'Curl con barra de agarre invertido', sets: 3, reps: '10-12'},
                { name: 'Dips en paralelas con peso', sets: 3, reps: '8-10'}
              ],
              day6: [ // Pierna (copia day3 advanced)
                { name: 'Sentadilla con barra', sets: 4, reps: '6-8'},
                { name: 'Peso muerto rumano con barra', sets: 4, reps: '8-10'},
                { name: 'Prensa de piernas', sets: 3, reps: '10-12'},
                { name: 'Extensiones de cuádriceps', sets: 3, reps: '15-20'},
                { name: 'Curl femoral tumbado', sets: 3, reps: '15-20'},
                { name: 'Zancadas búlgaras con mancuernas', sets: 3, reps: '10-12 (por pierna)'},
                { name: 'Elevación de gemelos de pie', sets: 4, reps: '15-20'}
              ]
            }
          }
        }
      }
    }
  };

  // 2) CLONAMOS la sección 'mujer' tras definir 'hombre'
  routines.mujer = JSON.parse(JSON.stringify(routines.hombre));
  // Ajustamos sólo el título en cada bloque
  Object.entries(routines.mujer).forEach(([type, block]) => {
    if (type === 'ppl')          block.title = 'PPL Femenino';
    else if (type === 'arnold')  block.title = 'Arnold Split Femenino';
    else                          block.title += ' Femenina';
  });

  // —— el resto de tu código: renderTypes(), showRoutine(), event listeners ——

  const genderBtns      = document.querySelectorAll('.gender-btn');
  const difficultyBtns  = document.querySelectorAll('.difficulty-btn');
  const typesContainer  = document.querySelector('.routine-types');
  const detailsContainer = document.querySelector('.routine-details');

  function renderTypes() {
    typesContainer.innerHTML = '';
    detailsContainer.style.display = 'none';
    const list = routines[selectedGender];
    Object.keys(list).forEach(key => {
      const btn = document.createElement('button');
      btn.className = 'type-btn';
      btn.textContent = list[key].title;
      btn.dataset.type = key;
      btn.addEventListener('click', () => showRoutine(key, btn));
      typesContainer.appendChild(btn);
    });
    // pre-selección
    if (initialGoal) {
      const pre = typesContainer.querySelector(`.type-btn[data-type="${initialGoal}"]`);
      if (pre) pre.click();
    }
  }

  function showRoutine(type, btn) {
    typesContainer.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const data = routines[selectedGender][type];
    const lvl = selectedLevel;

    let html = `<div class="advice">${data.advice}</div>`;
    html += `<h3>${data.title} — ${lvl === 'beginner' ? 'Principiante' : 'Avanzado'}</h3>`;

    // si hay schedule (PPL o Arnold)
    if (data.levels[lvl].schedule) {
      const sched = data.levels[lvl].schedule;
      html += `<div class="ppl-nav">`;
      ['day1', 'day2', 'day3', 'day4', 'day5', 'day6'].forEach(d => {
        const label = {
          day1: 'Día 1', day2: 'Día 2', day3: 'Día 3',
          day4: 'Día 4', day5: 'Día 5', day6: 'Día 6'
        }[d];
        html += `<button class="day-btn" data-day="${d}">${label}</button>`;
      });
      html += `</div><div class="ppl-day-details"></div>`;
      detailsContainer.innerHTML = html;
      detailsContainer.style.display = 'block';

      // añadimos listeners a cada día
      const dayBtns = detailsContainer.querySelectorAll('.day-btn');
      const details = detailsContainer.querySelector('.ppl-day-details');
      function renderDay(d) {
        details.innerHTML = '';
        sched[d].forEach(e => {
          const div = document.createElement('div');
          div.textContent = `${e.name} — ${e.sets}×${e.reps}`;
          details.appendChild(div);
        });
      }
      dayBtns.forEach(b => {
        b.addEventListener('click', () => {
          dayBtns.forEach(x => x.classList.remove('active'));
          b.classList.add('active');
          renderDay(b.dataset.day);
        });
      });
      // auto-mostrar día 1
      dayBtns[0].click();
    } else {
      // resto de rutinas simples
      html += '<ul>';
      data.levels[lvl].exercises.forEach(e => {
        html += `<li>${e.name} — ${e.sets}×${e.reps}</li>`;
      });
      html += '</ul>';
      detailsContainer.innerHTML = html;
      detailsContainer.style.display = 'block';
    }
  }

  genderBtns.forEach(b => {
    b.addEventListener('click', () => {
      genderBtns.forEach(x => x.classList.remove('active'));
      b.classList.add('active');
      selectedGender = b.dataset.gender;
      renderTypes();
    });
  });

  difficultyBtns.forEach(b => {
    b.addEventListener('click', () => {
      difficultyBtns.forEach(x => x.classList.remove('active'));
      b.classList.add('active');
      selectedLevel = b.dataset.level;
      const active = typesContainer.querySelector('.type-btn.active');
      if (active) showRoutine(active.dataset.type, active);
    });
  });

  // render inicial
  renderTypes();
});