@extends('layout')

@section('content')
<link rel="stylesheet" href="/css/coinflip.css">
<script type="text/javascript" src="/js/coinflip.js"></script>
<div class="section game-section">
    <div class="container">
        <div class="game">
            <div class="game-sidebar">
                <div class="sidebar-block">
                    <div class="bet-component">
                        <div class="bet-form">
                            <div class="form-row">
                                <label>
                                    <div class="form-label"><span>Valor da Aposta</span></div>
                                    <div class="form-row">
                                        <div class="form-field">
                                            <input type="text" name="sum" class="input-field no-bottom-radius" value="0.00" id="sum">
                                            <button type="button" class="btn btn-bet-clear" data-action="clear">
												<svg class="icon icon-close">
													<use xlink:href="/img/symbols.svg#icon-close"></use>
												</svg>
                                            </button>
                                            <div class="buttons-group no-top-radius">
                                                <button type="button" class="btn btn-action" data-action="plus" data-value="0.10">+0.10</button>
                                                <button type="button" class="btn btn-action" data-action="plus" data-value="0.50">+0.50</button>
                                                <button type="button" class="btn btn-action" data-action="plus" data-value="1">+1.00</button>
                                                <button type="button" class="btn btn-action" data-action="multiply" data-value="2">2X</button>
                                                <button type="button" class="btn btn-action" data-action="divide" data-value="2">1/2</button>
                                                <button type="button" class="btn btn-action" data-action="all">MAX</button>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <button type="button" class="btn btn-green btn-play"><span>Criar Partida</span></button>
                        </div>
                        <div class="bet-footer">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#fairModal">
                                <svg class="icon icon-fairness">
                                    <use xlink:href="/img/symbols.svg#icon-fairness"></use>
                                </svg><span>Fairplay</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
			<div class="game-component">
				<div class="game-block">
					<div class="progress-wrap">
						<!---<div class="progress-item left">
							<div class="title">Мин. сумма: <span id="minBet">{{$settings->flip_min_bet}}</span> <svg class="icon icon-coin balance"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></div>
							<div class="title">Макс. сумма: <span id="maxBet">{{$settings->flip_max_bet}}</span> <svg class="icon icon-coin balance"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></div>
						</div>--->
					</div>
					<div class="game-area__wrap">
						<div class="game-area">
							<div class="game-area-content">
								<div class="coinflip-games">
                                    <div class="yours">
										<div class="line">
											<span>Suas Partidas</span>
										</div>
                                        <div class="scroll">
                                            @auth
                                            @foreach($rooms as $rl)
                                            @if($u->unique_id == $rl['unique_id'])
                                            <div class="game-coin flip_{{$rl['id']}}">
                                                <div class="top">
                                                    <div class="left">
                                                        <div class="players block">
															<div class="user win">
																<div class="ava user-link" data-id="{{$rl['unique_id']}}">
																   <img src="{{$rl['avatar']}}">
																</div>
																<div class="info">
																	<div class="name user-link" data-id="{{$rl['unique_id']}}">{{$rl['username']}}</div>
																	<p>{{$rl['heads_from']}} - {{$rl['heads_to']}} <svg class="icon"><use xlink:href="/img/symbols.svg#icon-ticket"></use></svg></p>
																</div>
															</div>
														</div>
                                                    </div>
                                                    <div class="center">
														<div class="vs">VS</div>
														<div class="arrow"></div>
														<div class="fixed-height">
															<div class="slider">
																<ul></ul>
															</div>
														</div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="players block">
                                                            <div class="user">
                                                                <div class="ava">
                                                                   <img src="/img/no_avatar.jpg">
                                                                </div>
                                                                <div class="info">
                                                                    <div class="name">Aguardando...</div>
                                                                    <p>0 - 0 <svg class="icon"><use xlink:href="/img/symbols.svg#icon-ticket"></use></svg></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom">
													<div class="info block">
														<div class="bank">
															<span class="type">Apostas da Partida:</span>
															<span class="val"><span>{{$rl['bank']}}</span> <svg class="icon icon-coin balance {{$rl['balType']}}"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></span>
														</div>
														<div class="ticket">
															<span class="type">Tickets:</span>
															<span class="val"><span>???</span> <svg class="icon"><use xlink:href="/img/symbols.svg#icon-ticket"></use></svg></span>
														</div>
													</div>
                                                	<div class="hash">
														<span class="title">HASH:</span> <span class="text" id="hash">{{$rl['hash']}}</span>
													</div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="actives">
										<div class="line">
											<span>Partidas Disponíveis</span>
										</div>
                                        <div class="scroll">
                                            @foreach($rooms as $rl)
                                            <div class="game-coin flip_{{$rl['id']}}">
                                                <div class="top">
                                                    <div class="left">
                                                        <div class="players block">
															<div class="user win">
																<div class="ava user-link" data-id="{{$rl['unique_id']}}">
																   <img src="{{$rl['avatar']}}">
																</div>
																<div class="info">
																	<div class="name user-link" data-id="{{$rl['unique_id']}}">{{$rl['username']}}</div>
																	<p>{{$rl['heads_from']}} - {{$rl['heads_to']}} <svg class="icon"><use xlink:href="/img/symbols.svg#icon-ticket"></use></svg></p>
																</div>
															</div>
														</div>
                                                    </div>
                                                    <div class="center">
														<div class="vs">VS</div>
														<div class="arrow"></div>
														<div class="fixed-height">
															<div class="slider">
																<ul></ul>
															</div>
														</div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="players block">
                                                            <div class="user">
                                                                <button type="button" class="btn btn-primary btn-join" data-id="{{$rl['id']}}"><span>Entrar</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom">
													<div class="info block">
														<div class="bank">
															<span class="type">Apostas da Partida:</span>
															<span class="val"><span>{{$rl['bank']}}</span> <svg class="icon icon-coin balance {{$rl['balType']}}"><use xlink:href="/img/symbols.svg#icon-coin"></use></svg></span>
														</div>
														<div class="ticket">
															<span class="type">Tickets:</span>
															<span class="val"><span>???</span> <svg class="icon"><use xlink:href="/img/symbols.svg#icon-ticket"></use></svg></span>
														</div>
													</div>
                                                	<div class="hash">
														<span class="title">HASH:</span> <span class="text" id="hash">{{$rl['hash']}}</span>
													</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@guest
				<div class="game-sign">
					<div class="game-sign-wrap">
						<div class="game-sign-block auth-buttons">
							Você precisa estar logado para jogar
							<button type="button" class="btn" id="loginRegister">Entrar ou Cadastrar</button>
							</a>
						</div>
					</div>
				</div>
				@endguest
			</div>
        </div>
    </div>
</div>
<div class="section bets-section">
	<div class="container">
		<div class="game-stats">
			<div class="table-heading">
				<div class="thead">
					<div class="tr">
						<div class="th">Jogadores</div>
						<div class="th"></div>
						<div class="th">Vencedor</div>
						<div class="th">Banco</div>
						<div class="th">Tickets</div>
						<div class="th">FairPlay</div>
					</div>
				</div>
			</div>
			<div class="table-stats-wrap" style="min-height: 530px; max-height: 100%;">
				<div class="table-wrap" style="transform: translateY(0px);">
					<table class="table">
						<tbody>
							@foreach($ended as $end)
							<tr>
								<td class="username">
									<button type="button" class="btn btn-link" data-id="{{ \App\Model\User::getUser($end->heads)->unique_id }}">
										<span class="sanitize-user">
											<div class="sanitize-avatar"><img src="{{ \App\Model\User::getUser($end->heads)->avatar }}" alt=""></div>
											<span class="sanitize-name">{{ \App\Model\User::getUser($end->heads)->username }}</span>
										</span>
									</button>
								</td>
								<td class="username">
									<button type="button" class="btn btn-link" data-id="{{ \App\Model\User::getUser($end->tails)->unique_id }}">
										<span class="sanitize-user">
											<div class="sanitize-avatar"><img src="{{ \App\Model\User::getUser($end->tails)->avatar }}" alt=""></div>
											<span class="sanitize-name">{{ \App\Model\User::getUser($end->tails)->username }}</span>
										</span>
									</button>
								</td>
								<td class="username">
									<button type="button" class="btn btn-link" data-id="{{ \App\Model\User::getUser($end->winner_id)->unique_id }}">
										<span class="sanitize-user">
											<div class="sanitize-avatar"><img src="{{ \App\Model\User::getUser($end->winner_id)->avatar }}" alt="" style="border: solid 1px #4986f5;"></div>
											<span class="sanitize-name">{{ \App\Model\User::getUser($end->winner_id)->username }}</span>
										</span>
									</button>
								</td>
								<td>
									<div class="bet-number">
										<span class="bet-wrap">
											<span>{{$end->bank}}</span>
											<svg class="icon icon-coin balance {{$end->balType}}">
												<use xlink:href="/img/symbols.svg#icon-coin"></use>
											</svg>
										</span>
									</div>
								</td>
								<td>
									<div class="bet-number">
										<span class="bet-wrap">
											<span>{{$end->winner_ticket}}</span>
											<svg class="icon">
												<use xlink:href="/img/symbols.svg#icon-ticket"></use>
											</svg>
										</span>
									</div>
								</td>
								<td>
									<button class="btn btn-primary checkGame" data-hash="{{$end->hash}}">Verificar</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
