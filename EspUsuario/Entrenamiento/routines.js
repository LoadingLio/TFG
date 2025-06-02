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
        advice: 'Para hipertrofia, descansa 1-2 min entre series y controla la fase excéntrica. Busca una sobrecarga progresiva.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Flexiones en pared', sets: 3, reps: '10-12' },
              { name: 'Sentadilla con silla', sets: 3, reps: '12-15' },
              { name: 'Remo invertido (mesa/barra baja)', sets: 3, reps: '8-10' },
              { name: 'Press hombros con botella', sets: 3, reps: '12' },
              { name: 'Curl bíceps con banda', sets: 3, reps: '15' },
              { name: 'Puente de glúteos', sets: 3, reps: '15' },
              { name: 'Plancha frontal', sets: 3, reps: '30s' },
              { name: 'Peso muerto con mancuerna (ligero)', sets: 3, reps: '10' },
              { name: 'Elevación de gemelos sentado', sets: 3, reps: '15-20' },
              { name: 'Extensiones de tríceps con mancuerna (a una mano)', sets: 3, reps: '12-15' }
            ]
          },
          advanced: {
            exercises: [
              { name: 'Press banca con barra', sets: 4, reps: '8-10' },
              { name: 'Sentadilla trasera', sets: 4, reps: '8-10' },
              { name: 'Remo con barra', sets: 4, reps: '8-10' },
              { name: 'Press militar de pie (barra)', sets: 4, reps: '8-10' },
              { name: 'Curl bíceps con barra', sets: 4, reps: '10-12' },
              { name: 'Peso muerto rumano', sets: 4, reps: '8-10' },
              { name: 'Fondos en paralelas (con peso opcional)', sets: 4, reps: '8-10' },
              { name: 'Zancadas caminando con mancuernas', sets: 4, reps: '12-15 (por pierna)' },
              { name: 'Elevación piernas colgado', sets: 4, reps: '12-15' },
              { name: 'Press de banca inclinado con mancuernas', sets: 3, reps: '10-12' },
              { name: 'Dominadas con agarre supino (chin-ups)', sets: 3, reps: 'máx.' },
              { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '12-15' },
              { name: 'Extensión de tríceps en polea alta', sets: 3, reps: '12-15' }
            ]
          }
        }
      },
      'perdida-grasa': {
        title: 'Pérdida de Grasa',
        advice: 'Mantén ritmo elevado y descansos cortos (30-45 s). Prioriza ejercicios compuestos y cardio.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Marcha en el sitio con rodillas altas', sets: 3, reps: '1 min' },
              { name: 'Sentadilla corporal', sets: 3, reps: '15' },
              { name: 'Burpees modificados (sin flexión)', sets: 3, reps: '8' },
              { name: 'Mountain climbers', sets: 3, reps: '30s' },
              { name: 'Plancha lateral', sets: 3, reps: '30s (por lado)' },
              { name: 'Step sobre escalón / silla', sets: 3, reps: '12 (por pierna)' },
              { name: 'Jumping jacks suaves', sets: 3, reps: '30s' },
              { name: 'Puente de glúteos', sets: 3, reps: '15' },
              { name: 'Remo con botellas de agua', sets: 3, reps: '15' },
              { name: 'Círculos con brazos', sets: 3, reps: '30s (adelante y atrás)' }
            ]
          },
          advanced: {
            exercises: [
              { name: 'HIIT (circuito 20 min - 40s trabajo/20s descanso)', sets: '–', reps: '–' },
              { name: 'Burpees completos', sets: 4, reps: '12' },
              { name: 'Mountain climbers', sets: 4, reps: '45s' },
              { name: 'Saltos con comba (doble o simple)', sets: 4, reps: '2 min' },
              { name: 'Sprints en sitio (rodillas al pecho)', sets: 5, reps: '20s' },
              { name: 'Box jumps', sets: 4, reps: '10' },
              { name: 'Plancha frontal (con movimiento)', sets: 4, reps: '45s' },
              { name: 'Russian twists (con peso opcional)', sets: 3, reps: '20 (por lado)' },
              { name: 'Swing con Kettlebell', sets: 4, reps: '15' },
              { name: 'Caminata de granjero (mancuernas pesadas)', sets: 3, reps: '40m' },
              { name: 'Sentadilla con salto', sets: 3, reps: '15' },
              { name: 'Flexiones pliométricas', sets: 3, reps: 'máx.' }
            ]
          }
        }
      },
      crossfit: {
        title: 'CrossFit',
        advice: 'Calienta bien y mantén la técnica en cada WOD. Escala los ejercicios según tu nivel.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Fran (simplificado)', sets: '21-15-9', reps: 'Thrusters (botella)/Burpees (sin flexión)' },
              { name: 'Cindy (AMRAP 10 min)', sets: '–', reps: '5 Pull-ups (asistidas)/10 Push-ups (rodillas)/15 Squats' },
              { name: 'Peso muerto ligero (barra sin peso o PVC)', sets: 3, reps: '8 (enfocando técnica)' },
              { name: 'Kettlebell deadlift (poco peso)', sets: 3, reps: '10' },
              { name: 'Wall ball suave (balón medicinal ligero)', sets: 3, reps: '10' },
              { name: 'Box step-up', sets: 3, reps: '12 (por pierna)' },
              { name: 'Remo en máquina (ritmo suave)', sets: 3, reps: '500 m' },
              { name: 'Plancha dinámica (ej. Plank to Push-up)', sets: 3, reps: '30s' },
              { name: 'Sentadilla aérea', sets: 3, reps: '15-20' },
              { name: 'Flexiones de rodillas', sets: 3, reps: '10-12' },
              { name: 'Push Press (con barra vacía o PVC)', sets: 3, reps: '8-10' },
              { name: 'Clean (con PVC o palo de escoba)', sets: 3, reps: '8-10 (técnica)' }
            ]
          },
          advanced: {
            exercises: [
              { name: 'Fran (21-15-9)', sets: '–', reps: 'Thrusters/Pull-ups' },
              { name: 'Cindy (AMRAP 20 min)', sets: '–', reps: '5 Pull-ups/10 Push-ups/15 Squats' },
              { name: 'Deadlift pesado (1RM o % de 1RM)', sets: 5, reps: '5' },
              { name: 'Snatch (barra olímpica)', sets: 4, reps: '6' },
              { name: 'Clean & jerk (barra olímpica)', sets: 4, reps: '6' },
              { name: 'Box jumps alto', sets: 4, reps: '12' },
              { name: 'Muscle-up progresión (anillas o barra)', sets: 3, reps: 'máx.' },
              { name: 'Toes to bar', sets: 4, reps: '10' },
              { name: 'Handstand Push-ups', sets: 3, reps: 'máx.' },
              { name: 'GHD Sit-ups', sets: 3, reps: '15' },
              { name: 'Overhead Squat', sets: 4, reps: '8-10' },
              { name: 'Bar Muscle-up', sets: 3, reps: 'máx.' }
            ]
          }
        }
      },
      calistenia: {
        title: 'Calistenia',
        advice: 'Controla la postura y progresa antes de añadir carga. Enfócate en la fuerza relativa.',
        levels: {
          beginner: {
            exercises: [
              { name: 'Flexiones de rodillas', sets: 3, reps: '12' },
              { name: 'Dominadas asistidas (banda elástica o máquina)', sets: 3, reps: 'máx.' },
              { name: 'Sentadilla corporal', sets: 3, reps: '15' },
              { name: 'Dips en banco', sets: 3, reps: '12' },
              { name: 'Sentadilla pistol asistida (con apoyo)', sets: 3, reps: '6 (por pierna)' },
              { name: 'Remo invertido (con pies en el suelo)', sets: 3, reps: '10' },
              { name: 'Planchas (frontal y lateral)', sets: 3, reps: '30s (cada)' },
              { name: 'Puente de glúteos', sets: 3, reps: '15' },
              { name: 'Zancadas sin peso', sets: 3, reps: '10-12 (por pierna)' },
              { name: 'Elevaciones de pantorrillas', sets: 3, reps: '15-20' },
              { name: 'Crunch abdominal', sets: 3, reps: '20' },
              { name: 'Reverse Plank', sets: 3, reps: '30s' }
            ]
          },
          advanced: {
            exercises: [
              { name: 'Flexiones estándar', sets: 4, reps: '15' },
              { name: 'Dominadas estrictas', sets: 4, reps: 'máx.' },
              { name: 'Dips en paralelas (con peso opcional)', sets: 4, reps: '12' },
              { name: 'Pistol squat (sentadilla a una pierna)', sets: 4, reps: '8 (por pierna)' },
              { name: 'L-sit (en paralelas o suelo)', sets: 3, reps: '20s' },
              { name: 'Muscle-up progresión (dominadas explosivas, dips altos)', sets: 3, reps: 'máx.' },
              { name: 'Archer push-ups', sets: 3, reps: '8 (por lado)' },
              { name: 'Elevación piernas colgado (rectas)', sets: 4, reps: '10' },
              { name: 'Flexiones a una mano (asistidas o completas)', sets: 3, reps: '3-5 (por lado)' },
              { name: 'Dominadas con una mano (negativas o asistidas)', sets: 3, reps: '3-5' },
              { name: 'Front Lever progresión (tuck, advanced tuck)', sets: 3, reps: 'máx. hold' },
              { name: 'Planche progresión (tuck, advanced tuck)', sets: 3, reps: 'máx. hold' }
            ]
          }
        }
      },
      ppl: {
        title: 'PPL (Push/Pull/Legs)',
        advice: 'Esquema semanal: P1/P4→Push; P2/P5→Pull; P3/P6→Legs; D7 descanso. Permite entrenar cada grupo muscular dos veces por semana.',
        levels: {
          beginner: {
            schedule: {
              day1: [ // Push
                { name: 'Press pecho con mancuerna', sets: 3, reps: '12' },
                { name: 'Press militar sentado (mancuernas)', sets: 3, reps: '10' },
                { name: 'Fondos asistidos (máquina o banco)', sets: 3, reps: '8-10' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '12' },
                { name: 'Flexiones en pared', sets: 3, reps: '10-12' },
                { name: 'Curl tríceps francés (mancuerna)', sets: 3, reps: '12' },
                { name: 'Press hombros con banda', sets: 3, reps: '15' },
                { name: 'Extensiones de tríceps en polea (individual)', sets: 3, reps: '15' }
              ],
              day2: [ // Pull
                { name: 'Remo con mancuerna (un brazo)', sets: 3, reps: '12 (por brazo)' },
                { name: 'Pull-ups asistidas (banda o máquina)', sets: 3, reps: 'máx.' },
                { name: 'Curl bíceps banda', sets: 3, reps: '15' },
                { name: 'Face pulls (polea)', sets: 3, reps: '15' },
                { name: 'Remo en máquina (sentado)', sets: 3, reps: '500 m' },
                { name: 'Curl martillo con mancuernas', sets: 3, reps: '12' },
                { name: 'Plancha frontal', sets: 3, reps: '30s' },
                { name: 'Encogimientos de hombros con mancuernas', sets: 3, reps: '15' }
              ],
              day3: [ // Legs
                { name: 'Sentadilla goblet', sets: 3, reps: '12' },
                { name: 'Peso muerto rumano (mancuernas)', sets: 3, reps: '10' },
                { name: 'Zancadas estáticas (mancuernas ligeras)', sets: 3, reps: '12 (por pierna)' },
                { name: 'Puente de glúteos', sets: 3, reps: '15' },
                { name: 'Elevación talones (sentado o de pie)', sets: 3, reps: '15' },
                { name: 'Plancha lateral', sets: 3, reps: '30s (por lado)' },
                { name: 'Ab-wheel modificado (de rodillas)', sets: 3, reps: '10' },
                { name: 'Extensiones de cuádriceps (máquina)', sets: 3, reps: '15' }
              ],
              day4: [ // Push (copia de day1, se puede variar ligeramente o aumentar dificultad)
                { name: 'Press pecho con mancuerna (inclinado)', sets: 3, reps: '12' },
                { name: 'Press hombros sentado (mancuernas)', sets: 3, reps: '10' },
                { name: 'Cruce de poleas (cables bajos)', sets: 3, reps: '15' },
                { name: 'Elevaciones frontales con mancuernas', sets: 3, reps: '12' },
                { name: 'Press francés con mancuerna (a dos manos)', sets: 3, reps: '12' },
                { name: 'Fondos en banco para tríceps', sets: 3, reps: '15' },
                { name: 'Flexiones declinadas (pies elevados)', sets: 3, reps: '8-10' },
                { name: 'Pájaros con mancuernas (hombro posterior)', sets: 3, reps: '15' }
              ],
              day5: [ // Pull (copia de day2)
                { name: 'Jalones al pecho (agarre neutro)', sets: 3, reps: '12' },
                { name: 'Remo en polea baja (agarre cerrado)', sets: 3, reps: '12' },
                { name: 'Curl bíceps con mancuernas (alterno)', sets: 3, reps: '15' },
                { name: 'Pull-aparts con banda', sets: 3, reps: '15' },
                { name: 'Hiperextensiones (espalda baja)', sets: 3, reps: '15' },
                { name: 'Curl de bíceps en banco Scott (mancuerna)', sets: 3, reps: '10-12' },
                { name: 'Crunch en máquina abdominal', sets: 3, reps: '15-20' },
                { name: 'Elevación de rodillas colgado (asistido)', sets: 3, reps: '12-15' }
              ],
              day6: [ // Legs (copia de day3)
                { name: 'Prensa de piernas (máquina, si disponible)', sets: 3, reps: '12-15' },
                { name: 'Curl femoral sentado (máquina)', sets: 3, reps: '12-15' },
                { name: 'Sentadilla búlgara (peso corporal)', sets: 3, reps: '10 (por pierna)' },
                { name: 'Abducciones de cadera (banda o máquina)', sets: 3, reps: '15-20' },
                { name: 'Extensiones de gemelos en máquina de pie', sets: 3, reps: '15-20' },
                { name: 'Buenos días con mancuernas ligeras', sets: 3, reps: '12' },
                { name: 'Paseo del granjero (mancuernas ligeras)', sets: 3, reps: '30m' },
                { name: 'Elevaciones de piernas (tumbado)', sets: 3, reps: '15' }
              ]
            }
          },
          advanced: {
            schedule: {
              day1: [ // Push
                { name: 'Press banca con barra', sets: 4, reps: '6-8' },
                { name: 'Fondos en paralelas (con lastre opcional)', sets: 4, reps: '8-10' },
                { name: 'Press militar con barra (de pie)', sets: 4, reps: '6-8' },
                { name: 'Aperturas con mancuernas (inclinado)', sets: 3, reps: '10-12' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '12-15' },
                { name: 'Press francés con barra Z', sets: 3, reps: '8-10' },
                { name: 'Push-ups con peso (disco en espalda)', sets: 3, reps: 'máx.' },
                { name: 'Extensiones de tríceps por encima de la cabeza (mancuerna a dos manos)', sets: 3, reps: '10-12' }
              ],
              day2: [ // Pull
                { name: 'Peso muerto convencional', sets: 4, reps: '5-8' },
                { name: 'Dominadas (lastradas si es posible)', sets: 4, reps: 'máx.' },
                { name: 'Remo con barra (agarre prono)', sets: 4, reps: '8-10' },
                { name: 'Face Pulls (polea)', sets: 3, reps: '12-15' },
                { name: 'Curl de bíceps con barra (recta)', sets: 3, reps: '10-12' },
                { name: 'Remo en T-bar', sets: 3, reps: '10-12' },
                { name: 'Encogimientos de hombros con barra', sets: 3, reps: '15-20' },
                { name: 'Curl de martillo con mancuernas (alterno)', sets: 3, reps: '10-12' }
              ],
              day3: [ // Legs
                { name: 'Sentadilla trasera con barra', sets: 4, reps: '6-8' },
                { name: 'Prensa de piernas', sets: 3, reps: '10-12' },
                { name: 'Peso muerto rumano con barra', sets: 3, reps: '10-12' },
                { name: 'Extensiones de cuádriceps (máquina)', sets: 3, reps: '12-15' },
                { name: 'Curl femoral tumbado (máquina)', sets: 3, reps: '12-15' },
                { name: 'Zancadas con barra (caminando)', sets: 3, reps: '10-12 (por pierna)' },
                { name: 'Elevación de talones de pie (máquina)', sets: 4, reps: '15-20' },
                { name: 'Glute bridge con barra (hip thrust)', sets: 3, reps: '12-15' }
              ],
              day4: [ // Push (variación o progresión)
                { name: 'Press inclinado con barra', sets: 4, reps: '6-8' },
                { name: 'Press declinado con mancuernas', sets: 3, reps: '8-10' },
                { name: 'Press de hombros con mancuernas (de pie)', sets: 4, reps: '8-10' },
                { name: 'Cruces en polea alta', sets: 3, reps: '12-15' },
                { name: 'Remo al mentón con barra', sets: 3, reps: '10-12' },
                { name: 'Fondos en máquina de tríceps', sets: 3, reps: '12-15' },
                { name: 'Push-ups con palmada', sets: 3, reps: 'máx.' },
                { name: 'Elevaciones laterales en máquina', sets: 3, reps: '15-20' }
              ],
              day5: [ // Pull (variación o progresión)
                { name: 'Dominadas con agarre supino (chin-ups) lastradas', sets: 4, reps: 'máx.' },
                { name: 'Remo con mancuerna (pesado)', sets: 4, reps: '8-10 (por brazo)' },
                { name: 'Jalones al pecho (agarre ancho)', sets: 3, reps: '10-12' },
                { name: 'Pullovers en polea alta (cuerda)', sets: 3, reps: '12-15' },
                { name: 'Curl de bíceps en predicador (barra Z)', sets: 3, reps: '8-10' },
                { name: 'Remo sentado en cable (agarre estrecho)', sets: 3, reps: '10-12' },
                { name: 'Curl de bíceps con cable (individual)', sets: 3, reps: '12-15 (por brazo)' },
                { name: 'Hiperextensiones invertidas', sets: 3, reps: '15-20' }
              ],
              day6: [ // Legs (variación o progresión)
                { name: 'Sentadilla frontal', sets: 4, reps: '6-8' },
                { name: 'Peso muerto sumo', sets: 4, reps: '6-8' },
                { name: 'Prensa de piernas (pies altos/bajos para énfasis)', sets: 3, reps: '10-12' },
                { name: 'Hack Squat (máquina)', sets: 3, reps: '10-12' },
                { name: 'Curl femoral de pie (máquina)', sets: 3, reps: '12-15 (por pierna)' },
                { name: 'Zancadas búlgaras con mancuernas', sets: 3, reps: '10-12 (por pierna)' },
                { name: 'Elevación de gemelos en máquina sentado', sets: 4, reps: '20-25' },
                { name: 'Buenos días con barra', sets: 3, reps: '10-12' }
              ]
            }
          }
        }
      },
      arnold: {
        title: 'Arnold Split',
        advice: '6 días: 1&4 Pecho/Espalda; 2&5 Hombro/Bíceps/Tríceps; 3&6 Pierna. Gran volumen para grupos musculares grandes.',
        levels: {
          beginner: {
            schedule: {
              day1: [ // Pecho/Espalda
                { name: 'Press banca con mancuernas', sets: 3, reps: '12' },
                { name: 'Remo con mancuerna (un brazo)', sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Press inclinado con mancuernas', sets: 3, reps: '12' },
                { name: 'Jalones al pecho en máquina', sets: 3, reps: '12' },
                { name: 'Aperturas con mancuernas en banco plano', sets: 3, reps: '15' },
                { name: 'Pull-over con mancuerna', sets: 3, reps: '12' },
                { name: 'Remo sentado en polea baja', sets: 3, reps: '12-15' },
                { name: 'Cruce de poleas (cables medios)', sets: 3, reps: '15' }
              ],
              day2: [ // Hombro/Bíceps/Tríceps
                { name: 'Press militar sentado con mancuernas', sets: 3, reps: '12' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl de bíceps con mancuernas (alterno)', sets: 3, reps: '15' },
                { name: 'Fondos de tríceps en banco', sets: 3, reps: '12' },
                { name: 'Elevaciones frontales con mancuernas', sets: 3, reps: '12' },
                { name: 'Pájaros con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl concentrado', sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Extensiones de tríceps por encima de la cabeza con una mancuerna', sets: 3, reps: '12-15' }
              ],
              day3: [ // Pierna
                { name: 'Sentadilla goblet', sets: 3, reps: '12' },
                { name: 'Peso muerto rumano con mancuernas', sets: 3, reps: '10' },
                { name: 'Zancadas con mancuernas', sets: 3, reps: '12 (por pierna)' },
                { name: 'Elevación de gemelos de pie', sets: 3, reps: '15' },
                { name: 'Extensiones de cuádriceps en máquina', sets: 3, reps: '15' },
                { name: 'Curl femoral sentado en máquina', sets: 3, reps: '15' },
                { name: 'Puente de glúteos', sets: 3, reps: '15' },
                { name: 'Abducciones de cadera (máquina o banda)', sets: 3, reps: '15-20' }
              ],
              day4: [ // Pecho/Espalda (copia day1)
                { name: 'Press banca con mancuernas', sets: 3, reps: '12' },
                { name: 'Remo con mancuerna (un brazo)', sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Press inclinado con mancuernas', sets: 3, reps: '12' },
                { name: 'Jalones al pecho en máquina', sets: 3, reps: '12' },
                { name: 'Aperturas con mancuernas en banco plano', sets: 3, reps: '15' },
                { name: 'Pull-over con mancuerna', sets: 3, reps: '12' },
                { name: 'Remo sentado en polea baja', sets: 3, reps: '12-15' },
                { name: 'Cruce de poleas (cables medios)', sets: 3, reps: '15' }
              ],
              day5: [ // Hombro/Bíceps/Tríceps (copia day2)
                { name: 'Press militar sentado con mancuernas', sets: 3, reps: '12' },
                { name: 'Elevaciones laterales con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl de bíceps con mancuernas (alterno)', sets: 3, reps: '15' },
                { name: 'Fondos de tríceps en banco', sets: 3, reps: '12' },
                { name: 'Elevaciones frontales con mancuernas', sets: 3, reps: '12' },
                { name: 'Pájaros con mancuernas', sets: 3, reps: '15' },
                { name: 'Curl concentrado', sets: 3, reps: '10-12 (por brazo)' },
                { name: 'Extensiones de tríceps por encima de la cabeza con una mancuerna', sets: 3, reps: '12-15' }
              ],
              day6: [ // Pierna (copia day3)
                { name: 'Sentadilla goblet', sets: 3, reps: '12' },
                { name: 'Peso muerto rumano con mancuernas', sets: 3, reps: '10' },
                { name: 'Zancadas con mancuernas', sets: 3, reps: '12 (por pierna)' },
                { name: 'Elevación de gemelos de pie', sets: 3, reps: '15' },
                { name: 'Extensiones de cuádriceps en máquina', sets: 3, reps: '15' },
                { name: 'Curl femoral sentado en máquina', sets: 3, reps: '15' },
                { name: 'Puente de glúteos', sets: 3, reps: '15' },
                { name: 'Abducciones de cadera (máquina o banda)', sets: 3, reps: '15-20' }
              ]
            }
          },
          advanced: {
            schedule: {
              day1: [ // Pecho/Espalda
                { name: 'Press de banca con barra', sets: 4, reps: '6-8' },
                { name: 'Remo con barra (agarre prono)', sets: 4, reps: '6-8' },
                { name: 'Press de banca inclinado con barra', sets: 3, reps: '8-10' },
                { name: 'Dominadas lastradas', sets: 3, reps: 'máx.' },
                { name: 'Aperturas en máquina Peck Deck', sets: 3, reps: '12-15' },
                { name: 'Remo sentado en cable (agarre estrecho)', sets: 3, reps: '10-12' },
                { name: 'Press declinado con barra', sets: 3, reps: '8-10' },
                { name: 'Jalones al pecho (agarre abierto)', sets: 3, reps: '10-12' }
              ],
              day2: [ // Hombro/Bíceps/Tríceps
                { name: 'Press militar con barra (de pie)', sets: 4, reps: '6-8' },
                { name: 'Elevaciones laterales con cable', sets: 3, reps: '12-15' },
                { name: 'Curl de bíceps con barra Z', sets: 3, reps: '8-10' },
                { name: 'Extensiones de tríceps con cable (agarre cuerda)', sets: 3, reps: '12-15' },
                { name: 'Press Arnold', sets: 3, reps: '10-12' },
                { name: 'Pájaros en banco inclinado (mancuernas)', sets: 3, reps: '12-15' },
                { name: 'Curl con barra de agarre invertido', sets: 3, reps: '10-12' },
                { name: 'Dips en paralelas con peso', sets: 3, reps: '8-10' }
              ],
              day3: [ // Pierna
                { name: 'Sentadilla con barra', sets: 4, reps: '6-8' },
                { name: 'Peso muerto rumano con barra', sets: 4, reps: '8-10' },
                { name: 'Prensa de piernas', sets: 3, reps: '10-12' },
                { name: 'Extensiones de cuádriceps', sets: 3, reps: '15-20' },
                { name: 'Curl femoral tumbado', sets: 3, reps: '15-20' },
                { name: 'Zancadas búlgaras con mancuernas', sets: 3, reps: '10-12 (por pierna)' },
                { name: 'Elevación de gemelos de pie (máquina)', sets: 4, reps: '15-20' },
                { name: 'Hip Thrust con barra', sets: 3, reps: '10-15' }
              ],
              day4: [ // Pecho/Espalda (variación o progresión)
                { name: 'Press de banca con mancuernas', sets: 4, reps: '8-10' },
                { name: 'Remo Pendlay', sets: 4, reps: '8-10' },
                { name: 'Press inclinado con mancuernas', sets: 3, reps: '10-12' },
                { name: 'Dominadas neutras (agarre estrecho)', sets: 3, reps: 'máx.' },
                { name: 'Aperturas en banco plano (mancuernas)', sets: 3, reps: '12-15' },
                { name: 'Pull-over con barra', sets: 3, reps: '10-12' },
                { name: 'Remo con cable (sentado, agarre V)', sets: 3, reps: '10-12' },
                { name: 'Push-ups con déficit', sets: 3, reps: 'máx.' }
              ],
              day5: [ // Hombro/Bíceps/Tríceps (variación o progresión)
                { name: 'Push Press con barra', sets: 4, reps: '8-10' },
                { name: 'Elevaciones laterales con mancuernas (unilaterales)', sets: 3, reps: '12-15 (por lado)' },
                { name: 'Curl de bíceps con mancuernas (supinación)', sets: 3, reps: '10-12' },
                { name: 'Extensión de tríceps en polea alta (barra recta)', sets: 3, reps: '12-15' },
                { name: 'Elevaciones frontales con barra', sets: 3, reps: '10-12' },
                { name: 'Deltoides posteriores en máquina', sets: 3, reps: '15-20' },
                { name: 'Curl martillo con cable (cuerda)', sets: 3, reps: '12-15' },
                { name: 'Fondos en máquina asistida (tríceps)', sets: 3, reps: 'máx.' }
              ],
              day6: [ // Pierna (variación o progresión)
                { name: 'Sentadilla búlgara con barra', sets: 4, reps: '8-10 (por pierna)' },
                { name: 'Peso muerto sumo con barra', sets: 4, reps: '6-8' },
                { name: 'Prensa de piernas (sentadilla hack con máquina)', sets: 3, reps: '10-12' },
                { name: 'Extensiones de cuádriceps (una pierna)', sets: 3, reps: '12-15 (por pierna)' },
                { name: 'Curl femoral de pie (una pierna)', sets: 3, reps: '12-15 (por pierna)' },
                { name: 'Buenos días con barra', sets: 3, reps: '10-12' },
                { name: 'Zancadas estáticas con barra (frontal)', sets: 3, reps: '10-12 (por pierna)' },
                { name: 'Elevación de gemelos sentado (máquina)', sets: 4, reps: '20-25' }
              ]
            }
          }
        }
      }
    }
  };

  // 2) CLONAMOS la sección 'mujer' tras definir 'hombre'
  // Es importante hacer una copia profunda (JSON.parse(JSON.stringify)) para que los objetos no se referencien
  // y podamos modificarlos independientemente para 'mujer'.
  routines.mujer = JSON.parse(JSON.stringify(routines.hombre));

  // Ajustamos sólo el título en cada bloque para el género "mujer"
  Object.entries(routines.mujer).forEach(([type, block]) => {
    if (type === 'hipertrofia') block.title = 'Hipertrofia Femenina';
    else if (type === 'perdida-grasa') block.title = 'Pérdida de Grasa Femenina';
    else if (type === 'crossfit') block.title = 'CrossFit Femenino';
    else if (type === 'calistenia') block.title = 'Calistenia Femenina';
    else if (type === 'ppl') block.title = 'PPL Femenino';
    else if (type === 'arnold') block.title = 'Arnold Split Femenino';
  });

  // Nota: Para las rutinas de mujer, si se deseara una adaptación más allá del título y las repeticiones
  // (por ejemplo, priorizar glúteos, o ajustar el nombre de algunos ejercicios más femeninos),
  // se haría aquí modificando directamente routines.mujer[type].levels[level].exercises o .schedule
  // Por ahora, con la copia, las rutinas y los ejercicios son los mismos pero con el título adaptado.
  // Ejemplo de ajuste específico para mujer en hipertrofia principiante (añadiendo glúteos):
  // routines.mujer.hipertrofia.levels.beginner.exercises.push({ name: 'Patada de glúteo en suelo', sets: 3, reps: '15-20 (por pierna)' });


  // --- Inicio del código de manejo de la interfaz ---

  const genderBtns = document.querySelectorAll('.gender-btn');
  const difficultyBtns = document.querySelectorAll('.difficulty-btn');
  const typesContainer = document.querySelector('.routine-types');
  const detailsContainer = document.querySelector('.routine-details');

  // Función para renderizar los tipos de rutina disponibles (Hipertrofia, Pérdida de Grasa, etc.)
  function renderTypes() {
    typesContainer.innerHTML = ''; // Limpiar el contenedor de tipos
    detailsContainer.style.display = 'none'; // Ocultar los detalles de la rutina al cambiar el tipo
    const list = routines[selectedGender]; // Obtener las rutinas para el género seleccionado

    // Crear y añadir los botones para cada tipo de rutina
    Object.keys(list).forEach(key => {
      const btn = document.createElement('button');
      btn.className = 'type-btn';
      btn.textContent = list[key].title;
      btn.dataset.type = key; // Guardar el tipo de rutina en un atributo de datos
      btn.addEventListener('click', () => showRoutine(key, btn)); // Asignar el evento click
      typesContainer.appendChild(btn);
    });

    // Pre-seleccionar un objetivo si se ha definido (útil si se viene de otra página con un objetivo predefinido)
    if (initialGoal) {
      const pre = typesContainer.querySelector(`.type-btn[data-type="${initialGoal}"]`);
      if (pre) {
        pre.click(); // Simular un click en el botón del objetivo inicial
        initialGoal = null; // Resetear para que no se active en futuros renderizados
      }
    }
  }

  // Función para mostrar los detalles de la rutina seleccionada
  function showRoutine(type, btn) {
    // Desactivar el botón de tipo de rutina previamente activo y activar el actual
    typesContainer.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const data = routines[selectedGender][type]; // Datos de la rutina seleccionada
    const lvl = selectedLevel; // Nivel de dificultad actual

    let html = `<div class="advice">${data.advice}</div>`; // Mostrar el consejo de la rutina
    html += `<h3>${data.title} — ${lvl === 'beginner' ? 'Principiante' : 'Avanzado'}</h3>`; // Título y nivel

    // Si la rutina tiene un horario (PPL o Arnold Split)
    if (data.levels[lvl].schedule) {
      const sched = data.levels[lvl].schedule;
      html += `<div class="ppl-nav">`;
      // Crear botones para cada día del horario
      ['day1', 'day2', 'day3', 'day4', 'day5', 'day6'].forEach(d => {
        const label = {
          day1: 'Día 1', day2: 'Día 2', day3: 'Día 3',
          day4: 'Día 4', day5: 'Día 5', day6: 'Día 6'
        }[d];
        html += `<button class="day-btn" data-day="${d}">${label}</button>`;
      });
      html += `</div><div class="ppl-day-details"></div>`; // Contenedor para los detalles del día
      detailsContainer.innerHTML = html;
      detailsContainer.style.display = 'block';

      // Añadir listeners a los botones de cada día
      const dayBtns = detailsContainer.querySelectorAll('.day-btn');
      const details = detailsContainer.querySelector('.ppl-day-details');

      // Función para renderizar los ejercicios de un día específico
      function renderDay(d) {
        details.innerHTML = ''; // Limpiar el contenido del día
        sched[d].forEach(e => {
          const div = document.createElement('div');
          div.textContent = `${e.name} — ${e.sets}×${e.reps}`; // Formato: Ejercicio - Series×Repeticiones
          details.appendChild(div);
        });
      }

      dayBtns.forEach(b => {
        b.addEventListener('click', () => {
          dayBtns.forEach(x => x.classList.remove('active')); // Desactivar todos los botones de día
          b.classList.add('active'); // Activar el botón del día actual
          renderDay(b.dataset.day); // Renderizar los ejercicios de ese día
        });
      });
      // Mostrar automáticamente el Día 1 al cargar la rutina PPL/Arnold
      dayBtns[0].click();
    } else {
      // Para rutinas simples (Hipertrofia, Pérdida de Grasa, CrossFit, Calistenia)
      html += '<ul>';
      data.levels[lvl].exercises.forEach(e => {
        html += `<li>${e.name} — ${e.sets}×${e.reps}</li>`; // Listar ejercicios
      });
      html += '</ul>';
      detailsContainer.innerHTML = html;
      detailsContainer.style.display = 'block';
    }
  }

  // Manejo de eventos para los botones de género
  genderBtns.forEach(b => {
    b.addEventListener('click', () => {
      genderBtns.forEach(x => x.classList.remove('active')); // Desactivar todos los botones de género
      b.classList.add('active'); // Activar el botón de género actual
      selectedGender = b.dataset.gender; // Actualizar el género seleccionado
      renderTypes(); // Volver a renderizar los tipos de rutina para el nuevo género
    });
  });

  // Manejo de eventos para los botones de dificultad
  difficultyBtns.forEach(b => {
    b.addEventListener('click', () => {
      difficultyBtns.forEach(x => x.classList.remove('active')); // Desactivar todos los botones de dificultad
      b.classList.add('active'); // Activar el botón de dificultad actual
      selectedLevel = b.dataset.level; // Actualizar el nivel seleccionado
      const active = typesContainer.querySelector('.type-btn.active'); // Obtener el tipo de rutina actualmente activo
      if (active) {
        showRoutine(active.dataset.type, active); // Volver a mostrar la rutina con el nuevo nivel
      }
    });
  });

  // Renderizado inicial de los tipos de rutina al cargar la página
  renderTypes();
});