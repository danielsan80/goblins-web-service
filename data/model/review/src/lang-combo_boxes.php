<?php

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is an add-on language file used to populate combo boxes in my     */
/* customized Reviews module.                                             */
/*                                                                        */
/* You only need to change quoted phrases, and if you added/removed some  */
/* elements, please note that counters are automatically updated at the   */
/* bottom of this page. If not noted otherwise, you can add elements with */
/* no respect for alphabetic listing (provided you still put the same     */
/* index for both entries of each item), then the module will keep any    */
/* needed ordered listing.                                                */
/*                                                                        */
/* Please remember that first two items in each array MUST be index 0 and */
/* valued as a blank string. If you change this, things won't work!!      */
/*                                                                        */
/* Also remember that corresponding elements in the two languages MUST    */
/* always be the same index number, otherwise things won't work!!         */
/*                                                                        */
/* Some arrays are treated in special way by the module, so before messing*/
/* up with the data, please read any informations I provided in the rest  */
/* of this page. As an example, you must not move or change items 5, 6, 8 */
/* in the GENERI array, and the whole array ESPANDIBILITA                 */
/**************************************************************************/

$generi = array();
$ambientazioni = array();
$meccaniche = array();
$tipi = array();
$gradidifficolta = array();
$collezionabilita = array();
$espandibilita = array();

// Limite voti per tabella Top Goblin Score, recensione deve avere più voti di questo parametro
$limite_numerovoti_topgs = 49;

// -----------------------------------------------------------------------------
// AMBIENTAZIONE
// -----------------------------------------------------------------------------
$ambientazioni['italian'][0] = '';
$ambientazioni['english'][0] = '';
$ambientazioni['italian'][1] = 'Antichità';
$ambientazioni['english'][1] = 'Ancient history';
$ambientazioni['italian'][2] = 'Astratto';
$ambientazioni['english'][2] = 'Abstract';
$ambientazioni['italian'][3] = 'Fantascienza';
$ambientazioni['english'][3] = 'Science fiction';
$ambientazioni['italian'][4] = 'Fantasy';
$ambientazioni['english'][4] = 'Fantasy';
$ambientazioni['italian'][5] = 'Far West';
$ambientazioni['english'][5] = 'Far West';
$ambientazioni['italian'][6] = 'Horror';
$ambientazioni['english'][6] = 'Horror';
$ambientazioni['italian'][7] = 'Medio evo';
$ambientazioni['english'][7] = 'Middle Age';
$ambientazioni['italian'][8] = 'Mitologia';
$ambientazioni['english'][8] = 'Mythology';
$ambientazioni['italian'][9] = 'Moderno';
$ambientazioni['english'][9] = 'Modern age';
$ambientazioni['italian'][10] = 'Napoleonico';
$ambientazioni['english'][10] = 'Napoleonic';
$ambientazioni['italian'][11] = 'Pirati';
$ambientazioni['english'][11] = 'Pirates';
$ambientazioni['italian'][12] = 'Preistoria';
$ambientazioni['english'][12] = 'Prehistoric';
$ambientazioni['italian'][13] = 'Rinascimento';
$ambientazioni['english'][13] = 'Renaissance';
$ambientazioni['italian'][14] = 'Storia recente';
$ambientazioni['english'][14] = 'Recent history';
$ambientazioni['italian'][15] = 'Cinema/Teatro';
$ambientazioni['english'][15] = 'Cinema/Theatre';
$ambientazioni['italian'][16] = 'Letteratura';
$ambientazioni['english'][16] = 'Literature';
$ambientazioni['italian'][17] = 'Epoche storiche';
$ambientazioni['english'][17] = 'Historical ages';
$ambientazioni['italian'][18] = 'Natura';
$ambientazioni['english'][18] = 'Nature';
$ambientazioni['italian'][19] = 'Viodeogioco';
$ambientazioni['english'][19] = 'Videogame';


// -----------------------------------------------------------------------------
// MECCANICHE
// -----------------------------------------------------------------------------
$meccaniche['italian'][0] = '';
$meccaniche['english'][0] = '';
$meccaniche['italian'][1] = 'Abilità/Destrezza';
$meccaniche['english'][1] = 'Ability/Dexterity';
$meccaniche['italian'][2] = 'Aste';
$meccaniche['english'][2] = 'Auctions';
$meccaniche['italian'][3] = 'Bluff';
$meccaniche['english'][3] = 'Bluff';
$meccaniche['italian'][4] = 'Commercio/Scambi';
$meccaniche['english'][4] = 'Commerce/Trade';
$meccaniche['italian'][5] = 'Cooperazione';
$meccaniche['english'][5] = 'Cooperative';
$meccaniche['italian'][6] = 'Deduzione';
$meccaniche['english'][6] = 'Deduction';
$meccaniche['italian'][7] = 'Gestione risorse';
$meccaniche['english'][7] = 'Resource manage';
$meccaniche['italian'][8] = 'Memoria';
$meccaniche['english'][8] = 'Memory';
$meccaniche['italian'][9] = 'Piazzamento';
$meccaniche['english'][9] = 'Positioning';
$meccaniche['italian'][10] = 'Puzzle';
$meccaniche['english'][10] = 'Puzzle';
$meccaniche['italian'][11] = 'Scelta simultanea';
$meccaniche['english'][11] = 'Simultaneous choice';
$meccaniche['italian'][12] = 'Sistema D20';
$meccaniche['english'][12] = 'D20 System';
$meccaniche['italian'][13] = 'Scommesse';
$meccaniche['english'][13] = 'Betting/Wagering';
$meccaniche['italian'][14] = 'Simulazione';
$meccaniche['english'][14] = 'Simulation';
$meccaniche['italian'][15] = 'Votazioni';
$meccaniche['english'][15] = 'Voting';
$meccaniche['italian'][16] = 'Wargame';
$meccaniche['english'][16] = 'Wargame';
$meccaniche['italian'][17] = 'Pesca e gioca';
$meccaniche['english'][17] = 'Draw and play';
$meccaniche['italian'][18] = 'Eliminazione';
$meccaniche['english'][18] = 'Elimination';
$meccaniche['italian'][19] = 'Scopri tessere';
$meccaniche['english'][19] = 'Reveal tiles';
$meccaniche['italian'][20] = 'Domino';
$meccaniche['english'][20] = 'Domino';
$meccaniche['italian'][21] = 'Controllo territorio';
$meccaniche['english'][21] = 'Territory control';
$meccaniche['italian'][22] = 'Scelte multiple';
$meccaniche['english'][22] = 'Multiple choices';
$meccaniche['italian'][23] = 'Collezione oggetti';
$meccaniche['english'][23] = 'Collect items';
$meccaniche['italian'][24] = 'Sistema Click';
$meccaniche['english'][24] = 'Click system';
$meccaniche['italian'][25] = 'Gioco delle pulci';
$meccaniche['english'][25] = 'Tiddleywinks';
$meccaniche['italian'][26] = 'Pastelli';
$meccaniche['english'][26] = 'Crayons';
$meccaniche['italian'][27] = 'Mappa modulare';
$meccaniche['english'][27] = 'Modular Board';
$meccaniche['italian'][28] = 'Sistema a Dischi';
$meccaniche['english'][28] = 'Disk system';
$meccaniche['italian'][29] = 'Tira e muovi';
$meccaniche['english'][29] = 'Roll and move';
$meccaniche['italian'][30] = 'Educativo';
$meccaniche['english'][30] = 'Educational';
$meccaniche['italian'][31] = 'Party Game';
$meccaniche['english'][31] = 'Party Game';
$meccaniche['italian'][32] = 'Tempo Reale';
$meccaniche['english'][32] = 'Real Time';
$meccaniche['italian'][33] = 'Quiz';
$meccaniche['english'][33] = 'Quiz';
$meccaniche['italian'][34] = 'Gioco per bambini';
$meccaniche['english'][34] = 'Kids game';
$meccaniche['italian'][35] = 'Sistema a blocchi';
$meccaniche['english'][35] = 'Block system';
$meccaniche['italian'][36] = 'Card driven';
$meccaniche['english'][36] = 'Card driven';
$meccaniche['italian'][37] = 'Sistema a impulsi';
$meccaniche['english'][37] = 'Pulse system';
$meccaniche['italian'][38] = 'Costruzione rete';
$meccaniche['english'][38] = 'Net building';


// -----------------------------------------------------------------------------
// ARGOMENTI E KEYWORDS
// -----------------------------------------------------------------------------
$tipi['italian'][0] = '';
$tipi['english'][0] = '';
$tipi['italian'][1] = 'Aerei';
$tipi['english'][1] = 'Airplanes';
$tipi['italian'][2] = 'Ambiente';
$tipi['english'][2] = 'Environment';
$tipi['italian'][3] = 'Animali';
$tipi['english'][3] = 'Animals';
$tipi['italian'][4] = 'Astronavi';
$tipi['english'][4] = 'Starships';
$tipi['italian'][5] = 'Automobili';
$tipi['english'][5] = 'Cars';
$tipi['italian'][6] = 'Avventura';
$tipi['english'][6] = 'Adventure';
$tipi['italian'][7] = 'Bighe';
$tipi['english'][7] = 'Chariots';
$tipi['italian'][8] = 'Cavalli';
$tipi['english'][8] = 'Horses';
$tipi['italian'][9] = 'Civiltà';
$tipi['english'][9] = 'Civilizations';
$tipi['italian'][10] = 'Combattimento';
$tipi['english'][10] = 'Combat/Fight';
$tipi['italian'][11] = 'Computer/Internet';
$tipi['english'][11] = 'Computer/Internet';
$tipi['italian'][12] = 'Corse';
$tipi['english'][12] = 'Races';
$tipi['italian'][13] = 'Diplomazia/Intrighi';
$tipi['english'][13] = 'Diplomacy/Intrigue';
$tipi['italian'][14] = 'Dungeon/Labirinti';
$tipi['english'][14] = 'Dungeons/Mazes';
$tipi['italian'][15] = 'Economia/Finanza';
$tipi['english'][15] = 'Economic/Financial';
$tipi['italian'][16] = 'Esplorazione';
$tipi['english'][16] = 'Exploration';
$tipi['italian'][17] = 'Fumetti/Umorismo';
$tipi['english'][17] = 'Humour/Comics';
$tipi['italian'][18] = 'Guerra';
$tipi['english'][18] = 'War';
$tipi['italian'][19] = 'Guerra mondiale I/II';
$tipi['english'][19] = 'World War (I/II)';
$tipi['italian'][20] = 'Industria';
$tipi['english'][20] = 'Industrial';
$tipi['italian'][21] = 'Magia/Alchimia';
$tipi['english'][21] = 'Magic/Alchemy';
$tipi['italian'][22] = 'Mistero/Assassinio';
$tipi['english'][22] = 'Mistery/Murder';
$tipi['italian'][23] = 'Navale';
$tipi['english'][23] = 'Nautical';
$tipi['italian'][24] = 'Palazzi/Edifici';
$tipi['english'][24] = 'Buildings';
$tipi['italian'][25] = 'Politica';
$tipi['english'][25] = 'Political';
$tipi['italian'][26] = 'Robot';
$tipi['english'][26] = 'Robots';
$tipi['italian'][27] = 'Ladri/Spie';
$tipi['english'][27] = 'Thieves/Spies';
$tipi['italian'][28] = 'Sport';
$tipi['english'][28] = 'Sports';
$tipi['italian'][29] = 'Treni';
$tipi['english'][29] = 'Trains';
$tipi['italian'][30] = 'Viaggi';
$tipi['english'][30] = 'Travels';
$tipi['italian'][31] = 'Mostri/Non morti';
$tipi['english'][31] = 'Monsters/Undeads';
$tipi['italian'][32] = 'Vita comune/Hobby';
$tipi['english'][32] = 'Common life/Hobby';
$tipi['italian'][33] = 'Viaggi nel tempo';
$tipi['english'][33] = 'Time travels';
$tipi['italian'][34] = 'Evoluzione';
$tipi['english'][34] = 'Evolution';
$tipi['italian'][35] = 'Insediamenti';
$tipi['english'][35] = 'Settlements';
$tipi['italian'][36] = 'Influenza/Fama';
$tipi['english'][36] = 'Influence/Fame';
$tipi['italian'][37] = 'Trasporti';
$tipi['english'][37] = 'Transports';
$tipi['italian'][38] = 'Fiabe/Racconti';
$tipi['english'][38] = 'Fables/Tales';
$tipi['italian'][39] = 'Piantagioni';
$tipi['english'][39] = 'Plantations';
$tipi['italian'][40] = 'Mare';
$tipi['english'][40] = 'Sea';
$tipi['italian'][41] = 'Religione';
$tipi['english'][41] = 'Religion';
$tipi['italian'][42] = 'Musica';
$tipi['english'][42] = 'Music';
$tipi['italian'][43] = 'Film/Serie TV';
$tipi['english'][43] = 'Movie/TV Serials';

// -----------------------------------------------------------------------------
// GENERI 
// Warning: never change/remove elements 5, 6 and 8, since these are differently
// treated by the module. If you do, you may experience unproper functioning.
// -----------------------------------------------------------------------------
$generi['italian'][0] = '';
$generi['english'][0] = '';
$generi['italian'][1] = 'Giochi da tavolo';
$generi['english'][1] = 'Boardgames';
$generi['italian'][2] = 'Giochi di carte';
$generi['english'][2] = 'Card games';
$generi['italian'][3] = 'Giochi di dadi';
$generi['english'][3] = 'Dice games';
$generi['italian'][4] = 'Giochi di miniature';
$generi['english'][4] = 'Miniature/3D games';
$generi['italian'][5] = 'Giochi di narrazione';
$generi['english'][5] = 'Storytelling games';
$generi['italian'][6] = 'Giochi di ruolo';
$generi['english'][6] = 'Roleplaying games';
$generi['italian'][7] = 'Giochi vari di altro tipo';
$generi['english'][7] = 'Unlisted: other games';
$generi['italian'][8] = 'Varie: accessori';
$generi['english'][8] = 'Xtra: Accessories';
$generi['italian'][9] = 'Party game';
$generi['english'][9] = 'Party games';
$generi['italian'][10] = 'Giochi di scacchiera';
$generi['english'][10] = 'Chessboard games';
$generi['italian'][11] = 'Giochi di parole';
$generi['english'][11] = 'Word games';


// -----------------------------------------------------------------------------
// GRADI DI DIFFICOLTA
// This list is not automatically ordered by the module, so don't change its
// elements if you don't really need. If you do, try keeping the alphabetically
// listing as ordered as you can.
// -----------------------------------------------------------------------------
$gradidifficolta['italian'][0] = '';
$gradidifficolta['english'][0] = '';
$gradidifficolta['italian'][1] = 'Immediato (chiunque)';
$gradidifficolta['english'][1] = 'Trivial (everyone)';
$gradidifficolta['italian'][2] = 'Semplice (giocatori occasionali)';
$gradidifficolta['english'][2] = 'Easy (occasional players)';
$gradidifficolta['italian'][3] = 'Medio (maggioranza dei giocatori)';
$gradidifficolta['english'][3] = 'Average (most players)';
$gradidifficolta['italian'][4] = 'Impegnativo (giocatori assidui)';
$gradidifficolta['english'][4] = 'Challenging (assiduous players)';
$gradidifficolta['italian'][5] = 'Complesso (giocatori esperti)';
$gradidifficolta['english'][5] = 'Hard (expert players)';

// -----------------------------------------------------------------------------
// COLLEZIONABILITA
// This list is not automatically ordered by the module, so don't change its
// elements, since you really don't need.
// -----------------------------------------------------------------------------
$collezionabilita['italian'][0] = '';
$collezionabilita['english'][0] = '';
$collezionabilita['italian'][1] = 'Collezionabile';
$collezionabilita['english'][1] = 'Collectible';

// -----------------------------------------------------------------------------
// ESPANDIBILITA
// Warning: never change this list, indexes are fixed and not ordered by the 
// module itself. Really, you don't need to mess up with this one...
// -----------------------------------------------------------------------------
$espandibilita['italian'][0] = 'Gioco completo o base';
$espandibilita['english'][0] = 'Complete or base game';
$espandibilita['italian'][1] = 'Espansione';
$espandibilita['english'][1] = 'Expansion';
$espandibilita['italian'][2] = 'Espansione e gioco completo';
$espandibilita['english'][2] = 'Expansion and complete game';

// -----------------------------------------------------------------------------
// COUNTERS
// These are used by the module to build combo and/or other things. Don't change
// this portion of the code!!
// -----------------------------------------------------------------------------
$num_generi = count($generi[$lang]);
$num_ambientazioni = count($ambientazioni[$lang]);
$num_meccaniche = count($meccaniche[$lang]);
$num_tipi = count($tipi[$lang]);
$num_gradidifficolta = count($gradidifficolta[$lang]);
$num_collezionabilita = count($collezionabilita[$lang]);
$num_espandibilita = count($espandibilita[$lang]);
// -----------------------------------------------------------------------------

?>