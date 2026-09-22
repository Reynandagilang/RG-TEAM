@extends('layouts.rgr-premium')

@section('title', 'Car Setup Configurator — Aerodinamika & Suspensi — Mobil 1 Team RG')
@section('meta_description', 'Configurator setup mobil balap interaktif M1TRG-F1. Atur wing angle, ride height, spring rate, dan lihat simulasi performa real-time.')

@section('content')
@php
    $setupsJson = json_encode($setups);
    $carsJson = json_encode($cars);
@endphp
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]"
     x-data="setupConfig()"
     x-init="init()"
     x-cloak
     data-setups='{{ $setupsJson }}'
     data-cars='{{ $carsJson }}'>
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-white/10 gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded">
                        ENGINEERING LAB
                    </span>
                    <span class="text-xs text-[#B8E637] font-mono">• SETUP CONFIGURATOR</span>
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                    CAR SETUP CONFIGURATOR
                </h1>
                <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                    Atur parameter aerodinamika, suspensi, dan ban secara interaktif. Lihat simulasi performa dan rekomendasi setup untuk setiap sirkuit.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('enterprise.engineering') }}" class="px-4 py-2.5 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors flex items-center gap-2">
                    Ke Engineering Dashboard
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">

            <!-- Setup Control Panel -->
            <div class="xl:col-span-1 space-y-6">

                <!-- Car Selector -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 17V3M12 3l-4 4m4-4l4 4"/></svg>
                        Pilih Mobil & Sirkuit
                    </h3>
                    <div class="space-y-4 text-xs font-mono">
                        <div>
                            <label class="block text-[#8C96A3] uppercase mb-1.5">Mobil</label>
                            <select x-model="selectedCarId" @change="loadCarData()"
                                class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2 text-white focus:border-[#E10600] focus:outline-none">
                                <template x-for="car in cars" :key="car.id">
                                    <option :value="car.id" x-text="car.model_name + ' #' + car.car_number"></option>
                                </template>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[#8C96A3] uppercase mb-1.5">Sirkuit</label>
                            <select x-model="selectedCircuit" @change="loadSetup()"
                                class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2 text-white focus:border-[#E10600] focus:outline-none">
                                <option value="Monaco">Circuit de Monaco</option>
                                <option value="Silverstone">Silverstone</option>
                                <option value="Spa">Spa-Francorchamps</option>
                                <option value="Monza">Monza</option>
                                <option value="Suzuka">Suzuka</option>
                                <option value="Austin">Circuit of the Americas</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Aerodynamics Settings -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v6l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Aerodinamika
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Front Wing Angle</label>
                                <span class="text-[#B8E637] font-bold" x-text="setup.front_wing_angle + '°'"></span>
                            </div>
                            <input type="range" min="5" max="12" step="0.1" x-model="setup.front_wing_angle"
                                class="w-full accent-cyan-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Rear Wing Angle</label>
                                <span class="text-[#B8E637] font-bold" x-text="setup.rear_wing_angle + '°'"></span>
                            </div>
                            <input type="range" min="5" max="12" step="0.1" x-model="setup.rear_wing_angle"
                                class="w-full accent-cyan-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Drag Coefficient</label>
                                <span class="text-[#B8E637] font-bold" x-text="setup.drag_coefficient"></span>
                            </div>
                            <input type="range" min="0.320" max="0.400" step="0.001" x-model.number="setup.drag_coefficient"
                                class="w-full accent-cyan-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Aero Load Multiplier</label>
                                <span class="text-[#B8E637] font-bold" x-text="setup.aerodynamic_load"></span>
                            </div>
                            <input type="range" min="0.7" max="1.3" step="0.01" x-model.number="setup.aerodynamic_load"
                                class="w-full accent-cyan-400">
                        </div>
                    </div>
                </div>

                <!-- Suspension Settings -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#F4B63D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l7-7m-7 7l7 7"/></svg>
                        Suspensi
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Front Ride Height</label>
                                <span class="text-[#F4B63D] font-bold" x-text="setup.front_ride_height + 'mm'"></span>
                            </div>
                            <input type="range" min="10" max="25" step="0.5" x-model="setup.front_ride_height"
                                class="w-full accent-amber-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Rear Ride Height</label>
                                <span class="text-[#F4B63D] font-bold" x-text="setup.rear_ride_height + 'mm'"></span>
                            </div>
                            <input type="range" min="15" max="35" step="0.5" x-model="setup.rear_ride_height"
                                class="w-full accent-amber-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Front Spring Rate</label>
                                <span class="text-[#F4B63D] font-bold" x-text="setup.front_spring_rate + ' N/m'"></span>
                            </div>
                            <input type="range" min="500" max="2000" step="10" x-model.number="setup.front_spring_rate"
                                class="w-full accent-amber-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Rear Spring Rate</label>
                                <span class="text-[#F4B63D] font-bold" x-text="setup.rear_spring_rate + ' N/m'"></span>
                            </div>
                            <input type="range" min="700" max="2500" step="10" x-model.number="setup.rear_spring_rate"
                                class="w-full accent-amber-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Brake Bias</label>
                                <span class="text-[#F4B63D] font-bold" x-text="setup.brake_bias"></span>
                            </div>
                            <input type="range" min="50" max="65" step="0.5" x-model="setup.brake_bias"
                                class="w-full accent-amber-400">
                        </div>
                    </div>
                </div>

                <!-- Tire Settings -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.825 12 6.5l1.675-1.675A.75.75 0 1 1 14.825 7l-2.5 2.5a.75.75 0 1 1-1.65-1.65l2.5-2.5a.75.75 0 0 1 1.125 0Z"/></svg>
                        Ban & Tekanan
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[#8C96A3] uppercase mb-1.5">Kompound</label>
                            <select x-model="setup.tyre_pressure_front" class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2 text-white focus:border-emerald-400 focus:outline-none">
                                <option value="SOFT">SOFT (C5)</option>
                                <option value="MEDIUM" selected>MEDIUM (C4)</option>
                                <option value="HARD">HARD (C3)</option>
                            </select>
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Front Pressure</label>
                                <span class="text-emerald-400 font-bold" x-text="setup.tyre_pressure_front_val + ' bar'"></span>
                            </div>
                            <input type="range" min="20" max="30" step="0.5" x-model.number="setup.tyre_pressure_front_val"
                                class="w-full accent-emerald-400">
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <label class="text-[#8C96A3]">Rear Pressure</label>
                                <span class="text-emerald-400 font-bold" x-text="setup.tyre_pressure_rear_val + ' bar'"></span>
                            </div>
                            <input type="range" min="18" max="28" step="0.5" x-model.number="setup.tyre_pressure_rear_val"
                                class="w-full accent-emerald-400">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Setup Visualization & Results -->
            <div class="xl:col-span-3 space-y-8">

                <!-- Simulated Car with Setup Visualization -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-black text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Visualizer Setup — <span class="text-[#1A8FFF]" x-text="setup.setup_name"></span>
                    </h3>

                    <!-- Car Diagram -->
                    <div class="relative bg-[#171B20] border border-white/5 rounded-xl h-64 mb-6 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-center bg-contain bg-no-repeat opacity-20"
                             style="background-image: url('/images/car-diagram.svg');"></div>

                        <!-- Animated Setup Elements -->
                        <div class="relative z-10 flex gap-12">
                            <!-- Front Wing -->
                            <div class="text-center">
                                <div class="w-2 h-16 bg-cyan-400 transition-all duration-300"
                                     :style="`transform: rotate(${(setup.front_wing_angle - 7.5) * 2}deg);`"></div>
                                <span class="text-[10px] text-[#8C96A3] font-mono mt-1">Front Wing</span>
                                <span class="text-xs text-cyan-400 font-bold block" x-text="setup.front_wing_angle + '°'"></span>
                            </div>

                            <!-- Rear Wing -->
                            <div class="text-center">
                                <div class="w-2 h-12 bg-cyan-400 transition-all duration-300"
                                     :style="`transform: rotate(${(setup.rear_wing_angle - 7.5) * 2}deg);`"></div>
                                <span class="text-[10px] text-[#8C96A3] font-mono mt-1">Rear Wing</span>
                                <span class="text-xs text-cyan-400 font-bold block" x-text="setup.rear_wing_angle + '°'"></span>
                            </div>

                            <!-- Ride Height -->
                            <div class="text-center">
                                <div class="w-16 h-2 bg-amber-400 rounded transition-all duration-300"
                                     :style="`margin-top: ${(setup.front_ride_height - 10) * 3}px;`"></div>
                                <span class="text-[10px] text-[#8C96A3] font-mono mt-1">Ride Height</span>
                                <span class="text-xs text-amber-400 font-bold block" x-text="setup.front_ride_height + ' / ' + setup.rear_ride_height + 'mm'"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Metrics -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="text-[10px] text-[#8C96A3] uppercase font-mono">Downforce</span>
                            <span class="font-display font-black text-xl text-[#B8E637]" x-text="formatMetric(downforce, 'kg')"></span>
                            <div class="w-full bg-white/5 h-1 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-[#B8E637] transition-all" :style="`width: ${downforce / 1200 * 100}%`"></div>
                            </div>
                        </div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="text-[10px] text-[#8C96A3] uppercase font-mono">Drag Index</span>
                            <span class="font-display font-black text-xl text-[#F4B63D]" x-text="dragIndex"></span>
                            <div class="w-full bg-white/5 h-1 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-[#F4B63D] transition-all" :style="`width: ${dragIndex / 40 * 100}%`"></div>
                            </div>
                        </div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="text-[10px] text-[#8C96A3] uppercase font-mono">Corner Speed</span>
                            <span class="font-display font-black text-xl text-cyan-400" x-text="cornerSpeed + ' km/h'"></span>
                            <div class="w-full bg-white/5 h-1 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-cyan-400 transition-all" :style="`width: ${cornerSpeed / 300 * 100}%`"></div>
                            </div>
                        </div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="text-[10px] text-[#8C96A3] uppercase font-mono">Setup Score</span>
                            <span class="font-display font-black text-xl text-emerald-400" x-text="setupScore + '/100'"></span>
                            <div class="w-full bg-white/5 h-1 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-emerald-400 transition-all" :style="`width: ${setupScore}%`"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Setup Recommendation -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
                    <h3 class="font-display font-black text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.674 6 4 8v10a3 3 0 0 0 1.5 2.65l7 4a3 3 0 0 0 4-2V8a3 3 0 0 1 1.5-2.65L12 4a3 3 0 0 0-2.326-1.34z"/></svg>
                        Rekomendasi Setup
                    </h3>
                    <div class="bg-[#171A1E] border border-white/5 rounded-lg p-5">
                        <p class="font-mono text-xs text-[#8C96A3] leading-relaxed" x-text="getRecommendation()">
                            Menunggu perhitungan...
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('setupConfig', () => ({
        setups: [],
        cars: [],
        selectedCarId: 1,
        selectedCircuit: 'Monaco',
        editingSetup: null,
        init: true,

        init() {
            this.setups = JSON.parse(this.$el.dataset.setups || '[]');
            this.cars = JSON.parse(this.$el.dataset.cars || '[]');
            this.selectedCarId = this.cars.length > 0 ? this.cars[0].id : 1;
            this.loadSetup();
        },

        get setup() {
            return this.editingSetup || this.getDefaultSetup();
        },

        getDefaultSetup() {
            return {
                setup_name: 'Custom Setup',
                front_wing_angle: 7.50,
                rear_wing_angle: 7.00,
                front_ride_height: 15.00,
                rear_ride_height: 20.00,
                front_spring_rate: 1000.0,
                rear_spring_rate: 1200.0,
                gear_ratio_final: 13.50,
                tyre_pressure_front: 'MEDIUM',
                tyre_pressure_front_val: 22.5,
                tyre_pressure_rear_val: 21.0,
                brake_bias: '58.0% Front',
                aerodynamic_load: 1.00,
                drag_coefficient: 0.350
            };
        },

        getDownforce() {
            const s = this.setup;
            return Math.round(s.front_wing_angle * 80 + s.rear_wing_angle * 120 + s.aerodynamic_load * 200);
        },

        get dragIndex() {
            const s = this.setup;
            return (s.drag_coefficient * 100).toFixed(1);
        },

        get cornerSpeed() {
            const s = this.setup;
            const downforce = s.front_wing_angle * 6 + s.rear_wing_angle * 4;
            return Math.round(265 - downforce + (s.aerodynamic_load - 1) * -20);
        },

        get setupScore() {
            const s = this.setup;
            let score = 0;
            if (s.front_wing_angle >= 5 && s.front_wing_angle <= 10) score += 25;
            if (s.rear_wing_angle >= 5 && s.rear_wing_angle <= 10) score += 25;
            if (s.aerodynamic_load >= 0.8 && s.aerodynamic_load <= 1.2) score += 20;
            if (s.drag_coefficient >= 0.32 && s.drag_coefficient <= 0.40) score += 15;
            if (Math.abs(s.front_spring_rate - s.rear_spring_rate) <= 500) score += 15;
            return Math.round(score);
        },

        get downforce() {
            return this.getDownforce();
        },

        getRecommendation() {
            const s = this.setup;
            let rec = '';
            if (s.front_wing_angle > 10) rec += '⚠️ Front wing angle terlalu tinggi — mengurangi straight-line speed. ';
            if (s.rear_wing_angle > 10) rec += '⚠️ Rear wing angle tinggi meningkatkan drag. ';
            if (s.aerodynamic_load > 1.2) rec += '⚠️ Aero load tinggi cocok untuk sirkuit pernedekan. ';
            if (s.drag_coefficient > 0.38) rec += '⚠️ Drag coefficient tinggi — kurangi rear wing. ';
            if (s.front_spring_rate - s.rear_spring_rate > 500) rec += '⚠️ Spring rate front-rear mismatch — oversteer risk. ';
            if (rec === '') rec = '✅ Setup optimal! Konfigurasi ini seimbang untuk kondisi sirkuit saat ini.';
            return rec;
        },

        loadCarData() {
            const car = this.cars.find(c => c.id == this.selectedCarId);
            if (car) {
                this.setup.setup_name = `${car.model_name} - ${this.selectedCircuit}`;
            }
        },

        loadSetup() {
            // Load existing setup for circuit or reset to default
            const existing = this.setups.find(s => s.circuit_name && s.circuit_name.includes(this.selectedCircuit));
            if (existing) {
                this.editingSetup = {...existing};
            } else {
                this.editingSetup = this.getDefaultSetup();
                this.editingSetup.setup_name = `Custom Setup - ${this.selectedCircuit}`;
            }
        },

        formatMetric(value, unit) {
            if (!value) return '0 ' + unit;
            return Math.round(value) + ' ' + unit;
        }
    }));
});
</script>
@endpush
