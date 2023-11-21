<x-filament-panels::page x-data="tabs">
    <div class="flex items-center justify-center">
        <x-icon-logo class="stroke-2 stroke-slate-200 h-full w-full object-cover" />
    </div>
    <div class="flex gap-x-4">
        <div class="tabs h-full " :class="{'open':leftSidebarOpen}">
            <nav class="tabs__nav">
                <ul class="tabs__nav-menu">
                    <li class="tabs__nav-item" data-tab="news" x-on:click="toggleLeftSidebarOpen()">News</li>
                    <li class="tabs__nav-item">Markets</li>
                </ul>
            </nav>
            <section class="tabs__content">
                <article class="tabs__content-item" id="news">
                    <h1>News tab</h1>
                </article>
                <article class="tabs__content-item" id="markets">
                    <h1>Markets tab</h1>
                </article>
            </section>
        </div>
        <div class="flex-1">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eos minima molestiae quae rem repellendus
                saepe suscipit. Ab culpa harum itaque neque optio pariatur porro possimus, praesentium provident quis
                sed.
            </div>
            <div>A accusantium ad aliquid architecto consequatur corporis cumque eveniet expedita, facilis fuga illo
                impedit inventore modi necessitatibus nihil, nisi numquam odit quas qui quisquam reiciendis, similique
                ullam veniam voluptas voluptatum.
            </div>
            <div>Ad aliquid amet assumenda autem blanditiis consequuntur dolorum ex, facere facilis ipsam laborum, nemo
                obcaecati quod saepe sapiente similique, ullam voluptatum. Asperiores, error, sit! Aliquid eveniet quasi
                quibusdam quis unde?
            </div>
            <div>Ab at, culpa excepturi minima molestiae natus praesentium quia vero! Aspernatur commodi corporis
                delectus, dolores eaque, ipsum nemo non numquam, odit omnis perferendis quasi recusandae similique sit
                totam veniam voluptates?
            </div>
        </div>
        <div class="tabs h-full " :class="{'open':rightSidebarOpen}">
            <nav class="tabs__nav">
                <ul class="tabs__nav-menu">
                    <li class="tabs__nav-item" data-tab="news" x-on:click="toggleLeftSidebarOpen()">News</li>
                    <li class="tabs__nav-item">Markets</li>
                </ul>
            </nav>
            <section class="tabs__content">
                <article class="tabs__content-item" id="news">
                    <h1>News tab</h1>
                </article>
                <article class="tabs__content-item" id="markets">
                    <h1>Markets tab</h1>
                </article>
            </section>
        </div>
    </div>

    {{--    <div class="section flex h-screen gap-x-4">--}}
    {{--        <aside class="relative flex border h-full max-h-full py-5 overflow-x-hidden" :class="leftSidebarOpen ? 'w-[550px]' : 'w-[80px]'">--}}
    {{--            <nav class="h-full w-[80px] bg-white relative z-30">--}}
    {{--                <ul class="grid gap-y-4">--}}
    {{--                    <li class="grid place-items-center cursor-pointer" x-on:click="toggleLeftSidebarOpen()">--}}
    {{--                        <x-heroicon-o-newspaper class="h-7 w-7"/>--}}
    {{--                        <span class="text-sm font-medium">News</span>--}}
    {{--                    </li>--}}
    {{--                    <li class="grid place-items-center cursor-pointer" x-on:click="toggleLeftSidebarOpen()">--}}
    {{--                        <x-heroicon-o-presentation-chart-line class="h-7 w-7"/>--}}
    {{--                        <span class="text-sm font-medium">Markets</span>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </nav>--}}
    {{--            <div class="h-full w-full px-4 transition-all duration-300 ease-in-out transform" :class="leftSidebarOpen ? 'translate-x-0' : '-translate-x-[1200px]'">--}}
    {{--                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis delectus nemo nisi sequi--}}
    {{--                    ullam. Debitis deserunt harum hic ipsum, minus mollitia natus nihil nisi odio optio perferendis--}}
    {{--                    quaerat sapiente sint.--}}
    {{--                </div>--}}
    {{--                <div>Beatae consequuntur incidunt odit officiis quibusdam, quo sed voluptate. At atque autem commodi--}}
    {{--                    debitis dolores dolorum, eligendi est exercitationem in iusto maiores, natus optio perferendis,--}}
    {{--                    provident quia quos saepe voluptatem?--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </aside>--}}
    {{--        <div class="">Architecto at atque consequuntur ea earum esse est eveniet excepturi explicabo facere id inventore--}}
    {{--            ipsa nisi porro provident, quaerat qui quisquam ratione repudiandae rerum soluta tempora temporibus totam--}}
    {{--            vero--}}
    {{--            voluptatibus?--}}
    {{--        </div>--}}
    {{--        <aside class="border">--}}
    {{--        </aside>--}}
    {{--    </div>--}}

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tabs', () => ({
                    leftSidebarOpen: false,
                    rightSidebarOpen: false,
                    toggleLeftSidebarOpen() {
                        this.leftSidebarOpen = !this.leftSidebarOpen
                    },
                    toggleRightSidebarOpen() {
                        this.rightSidebarOpen = !this.leftSidebarOpen
                    }
                }
            ))
        })
    </script>

</x-filament-panels::page>
