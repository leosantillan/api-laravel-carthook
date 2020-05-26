<?php

/**
 * Exercise 1
 *
 * Database designed as Laravel migrations. Only up methods.
 */
Schema::create('players', function (Blueprint $table) {
    $table->id();
    $table->string('firstname');
    $table->string('lastname')->index();
    $table->timestamps();
});

Schema::create('teams', function (Blueprint $table) {
    $table->id();
    $table->string('name')->index();
    $table->timestamps();
});

Schema::create('games', function (Blueprint $table) {
    $table->id();
    $table->date('date')->index();
    $table->bigInteger('id_team_home')->unsigned()->index();
    $table->smallInteger('score_team_home')->unsigned();
    $table->bigInteger('id_team_away')->unsigned()->index();
    $table->smallInteger('score_team_away')->unsigned();
    $table->timestamps();
    $table->foreign('id_team_home')->references('id')->on('teams');
    $table->foreign('id_team_away')->references('id')->on('teams');
});

Schema::create('team_players', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('id_team')->unsigned();
    $table->bigInteger('id_player')->unsigned();
    $table->timestamps();
    $table->foreign('id_team')->references('id')->on('teams');
    $table->foreign('id_player')->references('id')->on('players');
});

Schema::create('stats', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('id_player')->unsigned()->index();
    $table->smallInteger('games')->unsigned();
    $table->smallInteger('rebounds')->unsigned();
    $table->smallInteger('assists')->unsigned();
    $table->smallInteger('blocks')->unsigned();
    $table->smallInteger('steals')->unsigned();
    $table->smallInteger('field_goals')->unsigned();
    $table->smallInteger('three_points_made')->unsigned();
    $table->timestamps();
    $table->foreign('id_player')->references('id')->on('players');
});
