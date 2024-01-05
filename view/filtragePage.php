
<div id="bus_disponibles" class="w-70 mx-auto">
    <?php foreach ($horaireDATA as $Horaire) : ?>
    <div
        class="group mt-4 relative overflow-hidden bg-white rounded-3xl p-4 shadow border-2 hasLabelQualite">
        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-3 border-dashed ltr:border-r-2 rtl:border-l-2 ltr:pr-4 rtl:pl-4">
                <div
                    class="flex justify-between items-center rounded-full py-1 ltr:pr-1 rtl:pr-4 ltr:pl-4 rtl:pl-1 bg-gold-500 text-black">
                    <div class="flex items-center"><span
                            class="text-primary transition-opacity duration-200 opacity-0 group-hover:opacity-100 text-xs">●
                        </span>
                        <div
                            class="flex items-center gap-8 ltr:-translate-x-2 rtl:translate-x-2 ltr:group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition duration-100 ease-in-out">
                            <p class="text-sm font-427"><?php echo $Horaire->getCompanyName(); ?>
                            </p>
                            <!---->
                            <!---->
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 items-center gap-10 mt-6"><img
                        data-src="assets/imgs/<?php echo $Horaire->getCompanyImage(); ?>" alt=""
                        class="group-hover:grayscale-0 grayscale ls-is-cached lazyloaded"
                        src="assets/imgs/<?php echo $Horaire->getCompanyImage(); ?>">
                    <div class="col-span-2">
                        <div class="flex justify-center items-baseline col-span-2 text-black">
                            <div x-data="{ tooltipDepartAdress: false }" class="flex flex-col items-center">
                                <p class="text-4xl text-center relative">
                                    <?php echo $Horaire->getHeureDepart(); ?>
                                </p>
                                <div x-on:mouseover="tooltipDepartAdress = true"
                                    x-on:mouseleave="tooltipDepartAdress = false"
                                    class="text-xs font-medium uppercase flex cursor-help flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="#ff6900" stroke-width="2">
                                            <path
                                                d="M5 8.515C5 4.917 8.134 2 12 2s7 2.917 7 6.515c0 3.57-2.234 7.735-5.72 9.225a3.277 3.277 0 0 1-2.56 0C7.234 16.25 5 12.084 5 8.515Z">
                                            </path>
                                            <path d="M14 9a2 2 0 1 1-4 0a2 2 0 0 1 4 0Z"></path>
                                            <path stroke-linecap="round"
                                                d="M20.96 15.5c.666.602 1.04 1.282 1.04 2c0 2.485-4.477 4.5-10 4.5S2 19.985 2 17.5c0-.718.374-1.398 1.04-2">
                                            </path>
                                        </g>
                                    </svg>
                                    &nbsp;<?php echo $Horaire->getVilleDepart(); ?>
                                    <div x-show.transition.origin.top="tooltipDepartAdress"
                                        class="relative -top-4 rtl:left-36 ltr:left-0"
                                        style="display: none;">
                                        <div
                                            class="normal-case	 absolute top-0 z-10 w-52 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-primary rounded-lg shadow-lg">
                                            Pres de la STCR; Boulevard Abderrahim Bouabid; Al Hamra, Agadir
                                            80000
                                        </div> <svg width="8" height="8"
                                            class="absolute z-10 w-6 h-6 text-primary transform ltr:-translate-x-12 rtl:-translate-x-32 -translate-y-3 fill-current stroke-current">
                                            <rect x="12" y="-10" width="8" height="8"
                                                transform="rotate(45)">
                                            </rect>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            &nbsp;&nbsp;<svg width="69" height="13" viewBox="0 0 69 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="rtl:rotate-180">
                                <path
                                    d="M68.5303 7.03032C68.8232 6.73743 68.8232 6.26256 68.5303 5.96966L63.7574 1.19669C63.4645 0.9038 62.9896 0.9038 62.6967 1.19669C62.4038 1.48959 62.4038 1.96446 62.6967 2.25735L66.9393 6.49999L62.6967 10.7426C62.4038 11.0355 62.4038 11.5104 62.6967 11.8033C62.9896 12.0962 63.4645 12.0962 63.7574 11.8033L68.5303 7.03032ZM6.55671e-08 7.25L68 7.24999L68 5.74999L-6.55671e-08 5.75L6.55671e-08 7.25Z"
                                    fill="#CDC7C2"></path>
                            </svg>&nbsp;&nbsp;
                            <div x-data="{ tooltipArriveeAdress: false }"
                                class="flex flex-col items-center">
                                <p class="text-4xl text-center relative">
                                    <?php echo $Horaire->getHeureArrivee(); ?>
                                    <!---->
                                </p>
                                <div x-on:mouseover="tooltipArriveeAdress = true"
                                    x-on:mouseleave="tooltipArriveeAdress = false"
                                    class="text-xs font-medium uppercase flex cursor-help flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="#ff6900" stroke-width="2">
                                            <path
                                                d="M5 8.515C5 4.917 8.134 2 12 2s7 2.917 7 6.515c0 3.57-2.234 7.735-5.72 9.225a3.277 3.277 0 0 1-2.56 0C7.234 16.25 5 12.084 5 8.515Z">
                                            </path>
                                            <path d="M14 9a2 2 0 1 1-4 0a2 2 0 0 1 4 0Z"></path>
                                            <path stroke-linecap="round"
                                                d="M20.96 15.5c.666.602 1.04 1.282 1.04 2c0 2.485-4.477 4.5-10 4.5S2 19.985 2 17.5c0-.718.374-1.398 1.04-2">
                                            </path>
                                        </g>
                                    </svg>
                                    &nbsp;<?php echo $Horaire->getVilleArrivee(); ?>
                                    <div x-show.transition.origin.top="tooltipArriveeAdress"
                                        class="relative -top-4 rtl:left-36 ltr:left-0"
                                        style="display: none;">
                                        <div
                                            class="normal-case	 absolute top-0 z-10 w-52 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-primary rounded-lg shadow-lg">
                                            Agence Globus Trans &amp; Itrane Voyage; Hay Chiffa, devant la
                                            station
                                            tramway Derb Milan, Boulvard El Fida, Casablanca

                                        </div>
                                        <svg width="8" height="8"
                                            class="absolute z-10 w-6 h-6 text-primary transform ltr:-translate-x-12 rtl:-translate-x-32 -translate-y-3 fill-current stroke-current">
                                            <rect x="12" y="-10" width="8" height="8"
                                                transform="rotate(45)">
                                            </rect>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-around items-center mt-6 text-black">
                            <div class="flex flex-wrap gap-2 justify-center w-3/5">
                                <p
                                    class="flex items-center border border-gray-800 rounded-3xl px-1.5 py-0.5 mr-1 text-xs">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1933_900)">
                                            <path
                                                d="M7 3.0625C7 2.94647 6.95391 2.83519 6.87186 2.75314C6.78981 2.67109 6.67853 2.625 6.5625 2.625C6.44647 2.625 6.33519 2.67109 6.25314 2.75314C6.17109 2.83519 6.125 2.94647 6.125 3.0625V7.875C6.12502 7.95212 6.14543 8.02785 6.18415 8.09454C6.22288 8.16123 6.27854 8.2165 6.3455 8.25475L9.408 10.0048C9.5085 10.0591 9.62626 10.0719 9.73611 10.0406C9.84596 10.0092 9.93919 9.93611 9.99587 9.83692C10.0525 9.73774 10.0682 9.62031 10.0394 9.50975C10.0107 9.39919 9.93982 9.30426 9.842 9.24525L7 7.62125V3.0625Z"
                                                fill="#23170D"></path>
                                            <path
                                                d="M7 14C8.85652 14 10.637 13.2625 11.9497 11.9497C13.2625 10.637 14 8.85652 14 7C14 5.14348 13.2625 3.36301 11.9497 2.05025C10.637 0.737498 8.85652 0 7 0C5.14348 0 3.36301 0.737498 2.05025 2.05025C0.737498 3.36301 0 5.14348 0 7C0 8.85652 0.737498 10.637 2.05025 11.9497C3.36301 13.2625 5.14348 14 7 14ZM13.125 7C13.125 8.62445 12.4797 10.1824 11.331 11.331C10.1824 12.4797 8.62445 13.125 7 13.125C5.37555 13.125 3.81763 12.4797 2.66897 11.331C1.52031 10.1824 0.875 8.62445 0.875 7C0.875 5.37555 1.52031 3.81763 2.66897 2.66897C3.81763 1.52031 5.37555 0.875 7 0.875C8.62445 0.875 10.1824 1.52031 11.331 2.66897C12.4797 3.81763 13.125 5.37555 13.125 7Z"
                                                fill="#23170D"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1933_900">
                                                <rect width="14" height="14" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    &nbsp;<?php echo $Horaire->getDuree(); ?>h
                                </p>
                                <!---->
                                <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between">
                <div class="relative">
                    <!---->
                    <div class="flex items-center">
                        <p class="text-gray-400 font-427 text-3xl before:content-empty before:border-t-3 before:border-solid before:border-promo before:-rotate-12 before:h-1 before:block before:relative before:top-5"
                            style="display: none;"><?= $Horaire->getPrice() ?></p>
                        <span style="display: none;"> &nbsp;&nbsp;</span>
                        <p class="font-427 text-4xl items-start flex text-black"><?= $Horaire->getPrice() ?>
                            <span class="text-lg font-normal">&nbsp;DH</span>
                        </p>
                    </div>
                    <p class="-mt-1 italic text-sm">par personne</p>
                </div>

            </div>
        </div>
        <!---->
    </div>
    <?php endforeach; ?>
</div>
