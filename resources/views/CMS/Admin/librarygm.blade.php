@extends('layouts.admin')

@section('content')
<header class="h-xl flex items-center justify-between px-gutter border-b border-outline-variant/30 bg-surface/50 backdrop-blur-md sticky top-0 z-40">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Game Library</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Manage all available games across NetCity tiers</p>
    </div>
    <div class="flex items-center gap-md">
        <div class="flex items-center gap-sm bg-surface-container-high px-sm py-xs rounded-full border border-outline-variant">
            <img class="w-8 h-8 rounded-full border border-primary/30 object-cover" alt="Admin Avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCRu2RxVwHNFhWKWYuo9QfTvKxEi2RTqX782dbSvQuPuM7ZV6nM6uSmCa78j-LtGfi2cmuuVzVHN9QlscEqBj4xOgr3lR9mzrQNwtcGnhRUNHyQORbZhL_Udxs6sQmNRq7ASMnBdspYLxBL_0hJgL8a1_nwoLXMmxiBjGmxFQ2OOOtOvr3E9hzBn0aU_vQUEixmJqfJLpiVTtoE_hp8qhTJ81XXLdX9hNqfc1BJKR9ry3GEFGDeXoQJ2yjk8WhH01YoAYFk1NL7s3I"/>
            <div class="hidden sm:block">
                <p class="font-label-md text-label-md text-on-surface">Admin Panel</p>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-wider">System Administrator</p>
            </div>
        </div>
        <button class="bg-primary-container text-on-primary-container px-md py-sm rounded-lg font-label-md text-label-md flex items-center gap-xs neon-glow hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-[20px]">sports_esports</span>
            Tambah Game
        </button>
    </div>
</header>

<div class="p-gutter space-y-lg">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Total Games</p>
                <h3 class="font-display-lg text-headline-lg text-primary">328</h3>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">inventory_2</span>
            </div>
        </div>
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Most Played Genre</p>
                <h3 class="font-display-lg text-headline-lg text-primary">FPS</h3>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">target</span>
            </div>
        </div>
        <div class="glass-card neon-border-top p-md rounded-xl flex items-center justify-between">
            <div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-xs">Storage Used</p>
                <h3 class="font-display-lg text-headline-lg text-primary">4.2 <span class="text-body-sm">/ 8 TB</span></h3>
                <div class="w-full bg-surface-container-highest h-1 rounded-full mt-sm overflow-hidden">
                    <div class="bg-primary h-full w-[52.5%] shadow-[0_0_8px_#00f2ff]"></div>
                </div>
            </div>
            <div class="bg-primary/10 p-sm rounded-full">
                <span class="material-symbols-outlined text-primary text-[32px]">hard_drive</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-md items-center justify-between">
        <div class="relative w-full md:w-96">
            <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
            <input class="w-full bg-surface-container-low border-outline-variant text-on-surface pl-xl py-sm rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/30 transition-all font-body-sm" placeholder="Search by game title or developer..." type="text"/>
        </div>
        <div class="flex gap-sm w-full md:w-auto">
            <select class="bg-surface-container-low border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary">
                <option>Genre: All</option>
                <option>FPS</option>
                <option>MOBA</option>
                <option>RPG</option>
                <option>Battle Royale</option>
            </select>
            <select class="bg-surface-container-low border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary">
                <option>Tier: All</option>
                <option>Standard</option>
                <option>VIP</option>
                <option>Pro Gamer</option>
            </select>
            <button class="bg-surface-variant text-on-surface p-sm rounded-lg hover:bg-surface-bright transition-all">
                <span class="material-symbols-outlined">tune</span>
            </button>
        </div>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-high border-b border-outline-variant/30">
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">ID</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Game Title & Developer</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Genre</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest text-center">Min. RAM</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest">Tier Availability</th>
                    <th class="px-md py-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/10">
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-md py-md font-body-sm text-primary">NC-G-01</td>
                    <td class="px-md py-md">
                        <div class="flex items-center gap-md">
                            <div class="w-12 h-16 rounded overflow-hidden flex-shrink-0 border border-outline-variant group-hover:border-primary/50 transition-colors">
                                <img class="w-full h-full object-cover" alt="Valorant Cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBX7OCk545XVhrleEzs6Y9gAnnujFvHwoToDElqygwbdvuCnXxpGwjTNuQOdlNuk9ebGeg0ALk5eZAthHMWPKLmHyV2c3IK_FkWTiJhceaN-7cM7n0AfxwzXjUUzkND3lnEvWi6YcnuDIlA_L2c8ajFVolQGKhu2BIbgzUh2ek_QaMYw3FPk-8dwNNsVNE-oHjvqsmYVqihgF3lbFZ00MsS1mvCH9ujXp6xCnLywFBK8_aH1dDUttInhofnq9C3mtIvTZKHSBBI5hU"/>
                            </div>
                            <div>
                                <p class="font-body-md text-on-surface font-semibold">Valorant</p>
                                <p class="text-[12px] text-on-surface-variant">Riot Games</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-md py-md">
                        <span class="bg-primary-container/10 text-primary-container px-xs py-1 rounded text-[10px] font-bold uppercase tracking-wider border border-primary/20">FPS</span>
                    </td>
                    <td class="px-md py-md text-center font-body-sm">4GB</td>
                    <td class="px-md py-md">
                        <div class="flex flex-wrap gap-xs">
                            <span class="text-[10px] bg-surface-variant text-on-surface-variant px-xs py-0.5 rounded border border-outline-variant">Standard</span>
                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded border border-secondary/30">VIP</span>
                        </div>
                    </td>
                    <td class="px-md py-md text-right">
                        <div class="flex justify-end gap-sm">
                            <button class="p-xs text-on-surface-variant hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                            <button class="p-xs text-on-surface-variant hover:text-error transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-md py-md font-body-sm text-primary">NC-G-02</td>
                    <td class="px-md py-md">
                        <div class="flex items-center gap-md">
                            <div class="w-12 h-16 rounded overflow-hidden flex-shrink-0 border border-outline-variant group-hover:border-primary/50 transition-colors">
                                <img class="w-full h-full object-cover" alt="Dota 2 Cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCHryJ2BMzsW6PbLobau92-Gmobn-yG__VIHICtCuYmT9EGlNE53I9cjVhRiTNO14uCFHLDLa55i3XJWKR4hioPEcxZ8Y5FkrrMn4JRryCykLQq9jjNQ9p80QxSovafqcPy98TKvoeFnXxGRNT2d5f_QE1NzIGoL-x_J94SQDkbuuZRXmHkv_FftZIFEQHqYP_Xof1NNREQ6VdoD0aBbm6-gTFBBj7_pLniEDm1g7m294SQOl_2aDRkq4gXEUsN7l2haq-kuBYnbc"/>
                            </div>
                            <div>
                                <p class="font-body-md text-on-surface font-semibold">Dota 2</p>
                                <p class="text-[12px] text-on-surface-variant">Valve Corporation</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-md py-md">
                        <span class="bg-primary-container/10 text-primary-container px-xs py-1 rounded text-[10px] font-bold uppercase tracking-wider border border-primary/20">MOBA</span>
                    </td>
                    <td class="px-md py-md text-center font-body-sm">8GB</td>
                    <td class="px-md py-md">
                        <div class="flex flex-wrap gap-xs">
                            <span class="text-[10px] bg-surface-variant text-on-surface-variant px-xs py-0.5 rounded border border-outline-variant">Standard</span>
                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded border border-secondary/30">VIP</span>
                        </div>
                    </td>
                    <td class="px-md py-md text-right">
                        <div class="flex justify-end gap-sm">
                            <button class="p-xs text-on-surface-variant hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                            <button class="p-xs text-on-surface-variant hover:text-error transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-md py-md font-body-sm text-primary">NC-G-03</td>
                    <td class="px-md py-md">
                        <div class="flex items-center gap-md">
                            <div class="w-12 h-16 rounded overflow-hidden flex-shrink-0 border border-outline-variant group-hover:border-primary/50 transition-colors">
                                <img class="w-full h-full object-cover" alt="Cyber Drive Cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk0P8wJCr65xq9sna8j0Ru5DLgH4h0Y_AU3GqSlzbwLO5vDS2XwU1eVWVSmZzCcO1tXtdh10t9RZyXVa2liurYruJt4LVhRKZGp81OeU4WxlaUK3TiRc13cFHOHmZiZRuXoCpUMElYMHcTLjIEE7IGzdEEvTR7Vi1tuECavLhh_W0cObvyL3sWwBM1zZA69Q0a9zV6twBzW0PYLS1sF0aCiF0LAP3kh7x6v6KlCAE1X7V29m19s4cjPzVup-H1b2KEmmmMpzeCgZI"/>
                            </div>
                            <div>
                                <p class="font-body-md text-on-surface font-semibold">Cyber Drive 2077</p>
                                <p class="text-[12px] text-on-surface-variant">Night City Interactive</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-md py-md">
                        <span class="bg-primary-container/10 text-primary-container px-xs py-1 rounded text-[10px] font-bold uppercase tracking-wider border border-primary/20">Racing</span>
                    </td>
                    <td class="px-md py-md text-center font-body-sm">16GB</td>
                    <td class="px-md py-md">
                        <div class="flex flex-wrap gap-xs">
                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded border border-secondary/30">VIP</span>
                            <span class="text-[10px] bg-on-tertiary-container/10 text-on-tertiary-container px-xs py-0.5 rounded border border-on-tertiary-container/30 font-bold">PRO GAMER</span>
                        </div>
                    </td>
                    <td class="px-md py-md text-right">
                        <div class="flex justify-end gap-sm">
                            <button class="p-xs text-on-surface-variant hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                            <button class="p-xs text-on-surface-variant hover:text-error transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-primary/5 transition-colors group">
                    <td class="px-md py-md font-body-sm text-primary">NC-G-04</td>
                    <td class="px-md py-md">
                        <div class="flex items-center gap-md">
                            <div class="w-12 h-16 rounded overflow-hidden flex-shrink-0 border border-outline-variant group-hover:border-primary/50 transition-colors">
                                <img class="w-full h-full object-cover" alt="Apex Cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAFZ90ApVTSLxEiMi5lpj4lGpAA2-uNKUC2SnU5BF1rY31jmqD4_SIYHi2F0ftQj3tizSUiQoiRBCNjUkF3xZaHto5Hk5R6O0bLH3mHsiCy_WaGdBqRJ3zte6yOPeC9m-p6VSSKcM8Of3Eg-K2IPRXQEpeRb3JgdveutshzONPhWim6p9XPYrRWi8G-ooDt_hyjYS6a_g1zocMhjECUmI7j23GNqnnutarsJjJDIz03Pg-S2-qMmed8G7DaX3PIsUghEPcNbutER_Q"/>
                            </div>
                            <div>
                                <p class="font-body-md text-on-surface font-semibold">Apex Legends</p>
                                <p class="text-[12px] text-on-surface-variant">Respawn Entertainment</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-md py-md">
                        <span class="bg-primary-container/10 text-primary-container px-xs py-1 rounded text-[10px] font-bold uppercase tracking-wider border border-primary/20">B. Royale</span>
                    </td>
                    <td class="px-md py-md text-center font-body-sm">8GB</td>
                    <td class="px-md py-md">
                        <div class="flex flex-wrap gap-xs">
                            <span class="text-[10px] bg-surface-variant text-on-surface-variant px-xs py-0.5 rounded border border-outline-variant">Standard</span>
                            <span class="text-[10px] bg-secondary-container/20 text-secondary px-xs py-0.5 rounded border border-secondary/30">VIP</span>
                        </div>
                    </td>
                    <td class="px-md py-md text-right">
                        <div class="flex justify-end gap-sm">
                            <button class="p-xs text-on-surface-variant hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                            <button class="p-xs text-on-surface-variant hover:text-error transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="px-md py-md bg-surface-container-low flex flex-col md:flex-row items-center justify-between gap-md">
            <p class="font-body-sm text-body-sm text-on-surface-variant">Showing 1 to 4 of 4 entries</p>
            <div class="flex items-center gap-xs">
                <button class="w-10 h-10 flex items-center justify-center rounded bg-surface-variant text-on-surface-variant hover:bg-primary/20 hover:text-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded bg-primary text-on-primary font-bold shadow-[0_0_10px_rgba(0,242,255,0.4)]">1</button>
                <button class="w-10 h-10 flex items-center justify-center rounded bg-surface-variant text-on-surface-variant hover:bg-primary/20 hover:text-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection