// routines.js
document.addEventListener('DOMContentLoaded', () => {
  let selectedGender = 'hombre';
  let selectedLevel  = 'beginner';

  const routines = {

    hombre: {
      hipertrofia: {
        title: 'Hipertrofia',
        advice: 'Para hipertrofia, descansa 1-2 min entre series y controla la fase excéntrica.',
        levels: {
          beginner: {
            exercises: [
              { name:'Flexiones en pared',       sets:3, reps:'10-12' },
              { name:'Sentadilla con silla',      sets:3, reps:'12-15' },
              { name:'Remo invertido',            sets:3, reps:'8-10' },
              { name:'Press hombros con botella', sets:3, reps:'12'   },
              { name:'Curl bíceps con banda',     sets:3, reps:'15'   },
              { name:'Puente de glúteos',         sets:3, reps:'15'   },
              { name:'Plancha frontal',           sets:3, reps:'30s'  },
              { name:'Peso muerto con mancuerna', sets:3, reps:'10'   }
            ]
          },
          advanced: {
            exercises: [
              { name:'Press banca con barra',    sets:4, reps:'8'   },
              { name:'Sentadilla trasera',       sets:4, reps:'8'   },
              { name:'Remo con barra',           sets:4, reps:'8'   },
              { name:'Press militar',            sets:3, reps:'10'  },
              { name:'Curl bíceps con barra',    sets:3, reps:'10'  },
              { name:'Peso muerto rumano',       sets:3, reps:'8-10'},
              { name:'Fondos en paralelas',      sets:3, reps:'8-10'},
              { name:'Zancadas caminando',       sets:3, reps:'12'  },
              { name:'Elevación piernas colgado',sets:3, reps:'12'  }
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
              { name:'Marcha en el sitio',        sets:3, reps:'1 min' },
              { name:'Sentadilla corporal',       sets:3, reps:'15'    },
              { name:'Burpees modificados',       sets:3, reps:'8'     },
              { name:'Mountain climbers',         sets:3, reps:'30s'   },
              { name:'Plancha lateral',           sets:3, reps:'30s'   },
              { name:'Step sobre escalón',        sets:3, reps:'12'    },
              { name:'Jumping jacks suaves',      sets:3, reps:'30s'   },
              { name:'Puente de glúteos',         sets:3, reps:'15'    }
            ]
          },
          advanced: {
            exercises: [
              { name:'HIIT (circuito 20 min)',    sets:'–', reps:'–'     },
              { name:'Burpees completos',         sets:4, reps:'12'    },
              { name:'Mountain climbers',         sets:4, reps:'45s'   },
              { name:'Saltos con comba',          sets:4, reps:'2 min' },
              { name:'Sprints en sitio',          sets:5, reps:'20s'   },
              { name:'Box jumps',                 sets:4, reps:'10'    },
              { name:'Plancha frontal',           sets:4, reps:'45s'   },
              { name:'Russian twists',            sets:3, reps:'20'    }
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
              { name:'Fran (simplificado)',     sets:'21-15-9', reps:'Thrusters/Burpees' },
              { name:'Cindy (AMRAP 10 min)',    sets:'–', reps:'5/10/15'           },
              { name:'Peso muerto ligero',      sets:3, reps:'8'                  },
              { name:'Kettlebell deadlift',     sets:3, reps:'10'                 },
              { name:'Wall ball suave',         sets:3, reps:'10'                 },
              { name:'Box step-up',             sets:3, reps:'12'                 },
              { name:'Remo en máquina',         sets:3, reps:'500 m'              },
              { name:'Plancha dinámica',        sets:3, reps:'30s'                }
            ]
          },
          advanced: {
            exercises: [
              { name:'Fran (21-15-9)',           sets:'–', reps:'Thrusters/Pull-ups' },
              { name:'Cindy (AMRAP 20 min)',     sets:'–', reps:'5/10/15'           },
              { name:'Deadlift pesado',         sets:5, reps:'5'                   },
              { name:'Snatch',                  sets:4, reps:'6'                   },
              { name:'Clean & jerk',            sets:4, reps:'6'                   },
              { name:'Box jumps alto',          sets:4, reps:'12'                  },
              { name:'Muscle-up progresión',    sets:3, reps:'máx.'                },
              { name:'Toes to bar',             sets:4, reps:'10'                  }
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
              { name:'Flexiones rodillas',      sets:3, reps:'12'  },
              { name:'Dominadas asistidas',     sets:3, reps:'máx.'},
              { name:'Sentadilla corporal',     sets:3, reps:'15'  },
              { name:'Dips en banco',           sets:3, reps:'12'  },
              { name:'Sentadilla pistol asistida',sets:3,reps:'6'   },
              { name:'Remo invertido',          sets:3, reps:'10'  },
              { name:'Planchas',                sets:3, reps:'30s' },
              { name:'Puente de glúteos',       sets:3, reps:'15'  }
            ]
          },
          advanced: {
            exercises: [
              { name:'Flexiones estándar',        sets:4, reps:'15' },
              { name:'Dominadas estrictas',       sets:4, reps:'máx.'},
              { name:'Dips en paralelas',         sets:4, reps:'12' },
              { name:'Pistol squat',              sets:4, reps:'8'  },
              { name:'L-sit',                     sets:3, reps:'20s'},
              { name:'Muscle-up progresión',      sets:3, reps:'máx.'},
              { name:'Archer push-ups',           sets:3, reps:'8'  },
              { name:'Elevaciones piernas colgado',sets:4,reps:'10'}
            ]
          }
        }
      },
      ppl: {
        title: 'PPL (Push/Pull/Legs)',
        advice: 'Esquema semanal: P1,P4→Push; P2,P5→Pull; P3,P6→Legs; descansa D7.',
        levels: {
          beginner: {
            schedule: {
              day1: [
                { name:'Press pecho con mancuerna', sets:3, reps:'12' },
                { name:'Press militar sentado',      sets:3, reps:'10' },
                { name:'Fondos en paralelas asistidas', sets:3, reps:'8-10' },
                { name:'Elevaciones laterales',      sets:3, reps:'12' },
                { name:'Flexiones en pared',         sets:3, reps:'10-12' },
                { name:'Press hombros con banda',    sets:3, reps:'15' },
                { name:'Curl tríceps francés',       sets:3, reps:'12' }
              ],
              day2: [
                { name:'Remo con mancuerna', sets:3, reps:'12' },
                { name:'Pull-ups asistidas',  sets:3, reps:'máx.' },
                { name:'Curl bíceps banda',   sets:3, reps:'15' },
                { name:'Face pulls',          sets:3, reps:'15' },
                { name:'Remo en máquina',     sets:3, reps:'500 m' },
                { name:'Curl martillo',       sets:3, reps:'12' },
                { name:'Plancha frontal',     sets:3, reps:'30s' }
              ],
              day3: [
                { name:'Sentadilla goblet',      sets:3, reps:'12' },
                { name:'Peso muerto rumano',     sets:3, reps:'10' },
                { name:'Zancadas estáticas',     sets:3, reps:'12' },
                { name:'Puente de glúteos',      sets:3, reps:'15' },
                { name:'Elevación de talones',   sets:3, reps:'15' },
                { name:'Plancha lateral',        sets:3, reps:'30s' },
                { name:'Ab-wheel (modificado)',  sets:3, reps:'10' }
              ],
              day4: [
                { name:'Press banca con barra',   sets:4, reps:'8'   },
                { name:'Press militar de pie',     sets:4, reps:'8'   },
                { name:'Fondos en paralelas',      sets:3, reps:'8-10'},
                { name:'Elevaciones frontales',    sets:3, reps:'12'  },
                { name:'Press hombros con mancuerna',sets:3,reps:'10'},
                { name:'Curl tríceps en polea',    sets:3, reps:'12'  },
                { name:'Flexiones diamante',       sets:3, reps:'12'  }
              ],
              day5: [
                { name:'Dominadas pronas',         sets:4, reps:'máx.' },
                { name:'Remo barra T',             sets:4, reps:'8'    },
                { name:'Curl bíceps con barra',    sets:4, reps:'10'   },
                { name:'Face pulls con banda',     sets:4, reps:'15'   },
                { name:'Remo banco inclinado',     sets:3, reps:'12'   },
                { name:'Curl inverso',             sets:3, reps:'12'   },
                { name:'Plancha con elevación',    sets:3, reps:'20s'  }
              ],
              day6: [
                { name:'Sentadilla frontal',        sets:4, reps:'8'   },
                { name:'Peso muerto sumo',          sets:4, reps:'8'   },
                { name:'Zancadas caminando',        sets:3, reps:'12'  },
                { name:'Elevación de gemelos',      sets:3, reps:'15'  },
                { name:'Sentadilla búlgara',        sets:3, reps:'10'  },
                { name:'Puente glúteos con peso',   sets:3, reps:'12'  },
                { name:'Ab-rollout',                sets:3, reps:'10'  }
              ]
            }
          },
          advanced: {
            schedule: {
              day1: [ /* tu lista avanzada día1 */ ],
              day2: [ /* tu lista avanzada día2 */ ],
              day3: [ /* tu lista avanzada día3 */ ],
              day4: [ /* tu lista avanzada día4 */ ],
              day5: [ /* tu lista avanzada día5 */ ],
              day6: [ /* tu lista avanzada día6 */ ]
            }
          }
        }
      },
      arnold: {
        title: 'Arnold Split',
        advice: 'Entrena 4 días con enfoque en volumen y descanso 60-90 s.',
        levels: {
          beginner: {
            exercises: [
              { name:'Día 1: Pecho/Espalda (5 ej.)', reps:'3×12' },
              { name:'Día 2: Piernas (5 ej.)',       reps:'3×12' },
              { name:'Día 3: Hombros/Brazos (5 ej.)', reps:'3×12' },
              { name:'Día 4: Core ligero (4 ej.)',    reps:'3×15' }
            ]
          },
          advanced: {
            exercises: [
              { name:'Día 1: Pecho/Espalda (8 ej.)', reps:'4×8-10' },
              { name:'Día 2: Piernas (8 ej.)',       reps:'4×8-10' },
              { name:'Día 3: Hombros/Brazos (8 ej.)', reps:'4×8-10' },
              { name:'Día 4: Full body intenso (6 ej.)', reps:'4×10' }
            ]
          }
        }
      }
    },

    mujer: {
      hipertrofia: { /* igual a hombre con ajustes */ },
      'perdida-grasa': { /* igual a hombre con ajustes */ },
      crossfit: { /* igual a hombre con ajustes */ },
      calistenia: { /* igual a hombre con ajustes */ },
      ppl: {
        title: 'PPL Femenino',
        advice: 'Esquema semanal: P1,P4→Push;P2,P5→Pull;P3,P6→Legs;descansa D7.',
        levels: {
          beginner: { schedule: { day1:[/*…*/],day2:[/*…*/],day3:[/*…*/],day4:[/*…*/],day5:[/*…*/],day6:[/*…*/] } },
          advanced: { schedule: { day1:[/*…*/],day2:[/*…*/],day3:[/*…*/],day4:[/*…*/],day5:[/*…*/],day6:[/*…*/] } }
        }
      },
      arnold: { /* igual a hombre con ajustes */ }
    }
  };

  const genderBtns       = document.querySelectorAll('.gender-btn');
  const difficultyBtns   = document.querySelectorAll('.difficulty-btn');
  const typesContainer   = document.querySelector('.routine-types');
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
    if (initialGoal) {
      const pre = typesContainer.querySelector(`.type-btn[data-type="${initialGoal}"]`);
      if (pre) pre.click();
    }
  }

  function showRoutine(type, btn) {
    typesContainer.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const data = routines[selectedGender][type];
    const lvl  = selectedLevel;

    let html = `<div class="advice">${data.advice}</div>`;
    html += `<h3>${data.title} — ${lvl==='beginner'?'Principiante':'Avanzado'}</h3>`;

    if (type === 'ppl') {
      const sched = data.levels[lvl].schedule;
      // Nav de días
      html += `<div class="ppl-nav">`;
      ['day1','day2','day3','day4','day5','day6'].forEach(d => {
        const label = {
          day1:'Push (Día 1)', day2:'Pull (Día 2)', day3:'Legs (Día 3)',
          day4:'Push (Día 4)', day5:'Pull (Día 5)', day6:'Legs (Día 6)'
        }[d];
        html += `<button class="day-btn" data-day="${d}">${label}</button>`;
      });
      html += `</div><div class="ppl-day-details"></div>`;
    } else {
      html += '<ul>';
      data.levels[lvl].exercises.forEach(e => {
        const repInfo = e.sets ? `${e.sets}×${e.reps}` : e.reps;
        html += `<li>${e.name} — ${repInfo}</li>`;
      });
      html += '</ul>';
    }

    detailsContainer.innerHTML = html;
    detailsContainer.style.display = 'block';

    if (type === 'ppl') {
      const dayBtns = detailsContainer.querySelectorAll('.day-btn');
      const details = detailsContainer.querySelector('.ppl-day-details');

      function renderDay(d) {
        details.innerHTML = '';
        // fallback a beginner si advanced no tiene datos
        const exercises = (sched && sched[d]) 
          ? sched[d] 
          : routines[selectedGender].ppl.levels.beginner.schedule[d];
        exercises.forEach(ex => {
          const div = document.createElement('div');
          div.textContent = `${ex.name} — ${ex.sets}×${ex.reps}`;
          details.appendChild(div);
        });
      }

      dayBtns.forEach(b => {
        b.addEventListener('click', () => {
          dayBtns.forEach(x=>x.classList.remove('active'));
          b.classList.add('active');
          renderDay(b.dataset.day);
        });
      });

      // Auto-click al primer día
      dayBtns[0].click();
    }
  }

  genderBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      genderBtns.forEach(x=>x.classList.remove('active'));
      btn.classList.add('active');
      selectedGender = btn.dataset.gender;
      renderTypes();
    });
  });

  difficultyBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      difficultyBtns.forEach(x=>x.classList.remove('active'));
      btn.classList.add('active');
      selectedLevel = btn.dataset.level;
      const activeType = typesContainer.querySelector('.type-btn.active');
      if (activeType) showRoutine(activeType.dataset.type, activeType);
    });
  });

  renderTypes();
});
