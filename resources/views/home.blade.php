@extends('layouts.visitor-layout')
@section('content')
    <main>
         <!-- HERO SECTION -->
        <section class="cc-hero">
            <img src="#"
                 alt="Student desk with laptop, notebook and coffee"
                 class="cc-hero-bg">

            <div class="cc-hero-overlay"></div>

            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <p class="cc-eyebrow">Student finance. Reimagined.</p>
                        <h1 class="cc-hero-title">
                            Every Coin Has a Story.
                        </h1>
                        <p class="cc-hero-text">
                            Track your income, control your expenses, set your
                            budget and build a better tomorrow. Because your
                            future isn't a heist — it's a plan.
                        </p>

                        <a href="{{route('dashboard')}}" class="btn cc-btn-primary">
                            Enter Your Vault
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <div class="cc-hero-badges">
                            <div class="cc-hero-badge">
                                <i class="bi bi-shield-check"></i>
                                <span>Secure &amp; Private</span>
                            </div>
                            <div class="cc-hero-badge">
                                <i class="bi bi-lightning-charge"></i>
                                <span>Simple &amp; Fast</span>
                            </div>
                            <div class="cc-hero-badge">
                                <i class="bi bi-mortarboard"></i>
                                <span>Built for Students</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         <!-- PROBLEM SECTION -->
        <section class="cc-section cc-section-light">
            <div class="container">
                <div class="row align-items-center gy-5">
                    <div class="col-12 col-lg-5 order-2 order-lg-1">
                        <p class="cc-eyebrow cc-eyebrow-dark">The problem</p>
                        <h2 class="cc-heading-dark">
                            Where Did My Money Go?
                        </h2>
                        <p class="cc-text-muted">
                            It's easy to lose track of your money. Small expenses
                            add up, and before you know it, you're left wondering.
                        </p>
                       
                    </div>

                    <div class="col-12 col-lg-4 order-1 order-lg-2">
                        <img src="visitors/visitors-images/Where Did My Money Go.png"
                             alt="Messy pile of receipts and a handwritten expense notepad"
                             class="cc-img-square">
                    </div>

                    <div class="col-12 col-lg-3 order-3">
                        <p class="cc-stat-label">Real students. Real expenses.</p>

                        <div class="cc-stat">
                            <p class="cc-stat-number">78%</p>
                            <p class="cc-stat-desc">of students struggle to manage their money.</p>
                        </div>

                        <hr class="cc-divider">

                        <div class="cc-stat">
                            <p class="cc-stat-number">3/5</p>
                            <p class="cc-stat-desc">don't know where their money goes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- THE VAULT / FEATURES SECTION -->
        <section id="features" class="cc-vault">
            <img src="visitors/visitors-images/Your Personal Finance Command Center.png"
                 alt="Ornate open vault door"
                 class="cc-vault-bg">
            <div class="cc-vault-overlay"></div>

            <div class="container position-relative">
                <div class="row align-items-center gy-5">
                    <div class="col-12 col-lg-5">
                        <p class="cc-eyebrow">The vault</p>
                        <h2 class="cc-heading-light">
                            Your Personal Finance Command Center.
                        </h2>
                        <p class="cc-hero-text">
                            Manage your money in one place. Track, plan and
                            grow — with tools built for your student life.
                        </p>
                        <a href="#" class="btn cc-btn-primary">
                            Explore Features
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="row g-3 g-md-4">
                            <div class="col-6 col-md-3">
                                <div class="cc-feature-card">
                                    <i class="bi bi-coin"></i>
                                    <h3>Income</h3>
                                    <p>Know what comes in</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-feature-card">
                                    <i class="bi bi-wallet2"></i>
                                    <h3>Expenses</h3>
                                    <p>See where it goes</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-feature-card">
                                    <i class="bi bi-bullseye"></i>
                                    <h3>Budget</h3>
                                    <p>Stay on track</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-feature-card">
                                    <i class="bi bi-piggy-bank"></i>
                                    <h3>Savings</h3>
                                    <p>Build your future</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         <!-- MONEY MAP SECTION -->
        <section class="cc-section cc-section-light">
            <div class="container">
                <div class="row align-items-center gy-5">
                    <div class="col-12 col-lg-4">
                        <p class="cc-eyebrow cc-eyebrow-dark">Your money map</p>
                        <h2 class="cc-heading-dark">
                            See the Bigger Picture.
                        </h2>
                        <p class="cc-text-muted">
                            Beautiful charts, clear insights and smart reports —
                            so you always know your financial health.
                        </p>
                        <a href="#" class="btn cc-btn-outline">
                            View Dashboard
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="cc-card">
                            <div class="row align-items-center g-4">
                                <div class="col-12 col-sm-5">
                                    <div class="cc-donut" role="img"
                                        aria-label="Donut chart of total expenses by category">
                                        <div class="cc-donut-center">
                                            <span class="cc-donut-label">Total Expenses</span>
                                            <span class="cc-donut-amount">$2,340</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <ul class="cc-legend list-unstyled mb-0">
                                        <li><span class="cc-dot cc-dot-1"></span>Food <em>32%</em></li>
                                        <li><span class="cc-dot cc-dot-2"></span>Transport <em>18%</em></li>
                                        <li><span class="cc-dot cc-dot-3"></span>Books <em>14%</em></li>
                                        <li><span class="cc-dot cc-dot-4"></span>Misc <em>12%</em></li>
                                        <li><span class="cc-dot cc-dot-5"></span>Entertainment <em>10%</em></li>
                                        <li><span class="cc-dot cc-dot-6"></span>Other <em>14%</em></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="cc-insight-card">
                            <i class="bi bi-lightbulb"></i>
                            <h3>Key Insights</h3>
                            <p>
                                You spent 20% more on food this month. Consider
                                cooking at home to save more.
                            </p>
                            <a href="#" class="cc-insight-link">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         <!-- HOW IT WORKS SECTION -->
        <section class="cc-how">
            <img src="visitors/visitors-images/Simple Steps. Big Results..png"
                 alt="Student studying at a desk"
                 class="cc-how-bg">
            <div class="cc-how-overlay"></div>

            <div class="container position-relative">
                <div class="row align-items-center gy-5">
                    <div class="col-12 col-lg-4">
                        <p class="cc-eyebrow">How it works</p>
                        <h2 class="cc-heading-light">
                            Simple Steps. Big Results.
                        </h2>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row g-4">
                            <div class="col-6 col-md-3">
                                <div class="cc-step">
                                    <div class="cc-step-icon"><i class="bi bi-person"></i></div>
                                    <h3>1. Create Account</h3>
                                    <p>It only takes a minute to get started.</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-step">
                                    <div class="cc-step-icon"><i class="bi bi-link-45deg"></i></div>
                                    <h3>2. Connect Your Data</h3>
                                    <p>Add your income, expenses and goals.</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-step">
                                    <div class="cc-step-icon"><i class="bi bi-bar-chart"></i></div>
                                    <h3>3. Track &amp; Manage</h3>
                                    <p>See where your money goes in real time.</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="cc-step">
                                    <div class="cc-step-icon"><i class="bi bi-star"></i></div>
                                    <h3>4. Save for Tomorrow</h3>
                                    <p>Build good habits and reach your goals.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         <!-- FINAL CTA SECTION -->
        <section class="cc-final-cta">
            <div class="row g-0 align-items-stretch">
                <div class="col-12 col-lg-6 mx-auto">
                    <div class="cc-final-content">
                        <p class="cc-eyebrow cc-eyebrow-dark text-center">Your future is</p>
                        <h2 class="cc-heading-dark text-center">
                            Worth Planning.
                        </h2>
                        <p class="cc-text-muted text-center">
                            Start your financial journey today and take control
                            of your student life.
                        </p>
                        <div class="text-center">
                            <a href="#" class="btn cc-btn-dark">
                                Enter Campus Coin
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    @endsection

