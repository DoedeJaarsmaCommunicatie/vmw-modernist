/******/ (function(modules) {
	// webpackBootstrap
	/******/ // The module cache
	/******/ var installedModules = {}; // The require function
	/******/
	/******/ /******/ function __webpack_require__(moduleId) {
		/******/
		/******/ // Check if module is in cache
		/******/ if (installedModules[moduleId]) {
			/******/ return installedModules[moduleId].exports;
			/******/
		} // Create a new module (and put it into the cache)
		/******/ /******/ var module = (installedModules[moduleId] = {
			/******/ i: moduleId,
			/******/ l: false,
			/******/ exports: {}
			/******/
		}); // Execute the module function
		/******/
		/******/ /******/ modules[moduleId].call(
			module.exports,
			module,
			module.exports,
			__webpack_require__
		); // Flag the module as loaded
		/******/
		/******/ /******/ module.l = true; // Return the exports of the module
		/******/
		/******/ /******/ return module.exports;
		/******/
	} // expose the modules object (__webpack_modules__)
	/******/
	/******/
	/******/ /******/ __webpack_require__.m = modules; // expose the module cache
	/******/
	/******/ /******/ __webpack_require__.c = installedModules; // define getter function for harmony exports
	/******/
	/******/ /******/ __webpack_require__.d = function(exports, name, getter) {
		/******/ if (!__webpack_require__.o(exports, name)) {
			/******/ Object.defineProperty(exports, name, {
				enumerable: true,
				get: getter
			});
			/******/
		}
		/******/
	}; // define __esModule on exports
	/******/
	/******/ /******/ __webpack_require__.r = function(exports) {
		/******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
			/******/ Object.defineProperty(exports, Symbol.toStringTag, {
				value: "Module"
			});
			/******/
		}
		/******/ Object.defineProperty(exports, "__esModule", { value: true });
		/******/
	}; // create a fake namespace object // mode & 1: value is a module id, require it // mode & 2: merge all properties of value into the ns // mode & 4: return value when already ns object // mode & 8|1: behave like require
	/******/
	/******/ /******/ /******/ /******/ /******/ /******/ __webpack_require__.t = function(
		value,
		mode
	) {
		/******/ if (mode & 1) value = __webpack_require__(value);
		/******/ if (mode & 8) return value;
		/******/ if (
			mode & 4 &&
			typeof value === "object" &&
			value &&
			value.__esModule
		)
			return value;
		/******/ var ns = Object.create(null);
		/******/ __webpack_require__.r(ns);
		/******/ Object.defineProperty(ns, "default", {
			enumerable: true,
			value: value
		});
		/******/ if (mode & 2 && typeof value != "string")
			for (var key in value)
				__webpack_require__.d(
					ns,
					key,
					function(key) {
						return value[key];
					}.bind(null, key)
				);
		/******/ return ns;
		/******/
	}; // getDefaultExport function for compatibility with non-harmony modules
	/******/
	/******/ /******/ __webpack_require__.n = function(module) {
		/******/ var getter =
			module && module.__esModule
				? /******/ function getDefault() {
						return module["default"];
				  }
				: /******/ function getModuleExports() {
						return module;
				  };
		/******/ __webpack_require__.d(getter, "a", getter);
		/******/ return getter;
		/******/
	}; // Object.prototype.hasOwnProperty.call
	/******/
	/******/ /******/ __webpack_require__.o = function(object, property) {
		return Object.prototype.hasOwnProperty.call(object, property);
	}; // __webpack_public_path__
	/******/
	/******/ /******/ __webpack_require__.p = "/"; // Load entry module and return exports
	/******/
	/******/
	/******/ /******/ return __webpack_require__((__webpack_require__.s = 1));
	/******/
})(
	/************************************************************************/
	/******/ {
		/***/ "./js/search_form.js":
			/*!***************************!*\
  !*** ./js/search_form.js ***!
  \***************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				new autoComplete({
					data: {
						src: [
							"100 Monta\xF1as Albar\xEDn blanco",
							"Monasterio Corias Guilfa",
							"Muscadet S\xE8vre et Maine - Les 2 Terres-",
							"Morisfarms Mandriolo Rosso",
							"Morisfarms Avolltore",
							"Domainte Glantenet Haute Cotes de Beaune",
							"Glantenet Haute Cotes de Nuits",
							"Glantenet Aligote",
							"Saupin muscadet sur lie 'Sevre et maine",
							"Garennes Saumur Blanc",
							"Domaine des Garennes Cabernet D'Anjou",
							"Garennes Saumur Blanc Empreinte",
							"Kogl Rubellus Ros\xE9",
							"Kogl Primus Inter Pares",
							"Kogl Victus",
							"Travaglino Pernero",
							"Travaglino Ramato",
							"Travaglino Campo dei Ciliegi Barbera",
							"Hlebec Revolution",
							"Hlebec Illuminati",
							"Kogl Renski Rizling",
							"Hlebec Blanc des Templiers",
							"Hlebec Amore",
							"Hlebec Furkl",
							"Hlebec Blanc de Bonaparte",
							"Krajnc Ros\xE9",
							"Krajnc Laski Rizling",
							"Domaine des Garennes Cremant de Loire Blanc",
							"Garennes Cremant de Loire Ros\xE9",
							"Baron de Filar Crianza",
							"Baron de Filar Reserva",
							"Baron de Filar Verdejo",
							"Carpinus Tokaji Furmint",
							"Carpinus Tokaji Asz\xFA 5 Puttonyos",
							"Carpinus Tokaji Furmint Late Harvest",
							"Carpinus Tokaji H\xE1rslevelu",
							"Carpinus Tokaji Furmint Grand Reserve",
							"Balatonbogl\xE1ri Esti-k\xE9k",
							"IKON 1199 Kir\xE1lyok",
							"IKON Shiraz",
							"IKON Tulip\xE1n",
							"Lellei Kadarka",
							"Szekszardi Bikav\xE9r",
							"Sinai Cabernet Franc",
							"Sina\xEF Cabernet Sauvignon",
							"Espargueira Red Selection",
							"C\xF4tes de Brouilly 2016 Domaine les Roches Bleues",
							"Domaine de la Creuze Noire Macon Villages",
							"Domaine de la Creuze Noire Saint-V\xE9ran",
							"Domaine de Rotisson Beaujolais blanc cuv\xE9e Nature des Pierres Dor\xE9es",
							"Domaine de la Creuze Noire Pouilly Fuiss\xE9",
							"Ch\xE2teau de Lavernette Granit Brut Nature",
							"Morisfarms Santa Chiara Bianco",
							"Garennes Ros\xE9 de Loire",
							"Baden Sp\xE4tburgunder Ros\xE9 Trocken",
							"Ahr Fr\xFChburgunder",
							"Picpoul de Pinet -Les Flamants-",
							"Robeal La Capilla verdejo",
							"Mas Rod\xF3 Merlot",
							"Mas Rod\xF3 Cabernet Sauvignon",
							"Mas Rod\xF3 Riesling",
							"Mas Rod\xF3 Merlot MAGNUM",
							"Mas Rod\xF3 Cabernet Sauvignon MAGNUM",
							"Rivaner Riesling Sekt",
							"Quinta da Lapa Merlot",
							"Nana Reserva",
							"Quinta da Lapa Touriga Nacional",
							"Quinta da Lapa Sauvignon Blanc",
							"Garennes Saumur Rouge le Brossay",
							"Artajona blanca Chardonnay-Viura",
							"Glantenet Haute Cotes de Nuits Rouge",
							"Costi\xE8res de N\xEEmes -Malacasca",
							"Vin de Pays du Val de Loire -Le Pas Rouge-",
							"Bergon sauvignon-blanc",
							"Barbera del Monferrato",
							"Dolcetto d'Ovada",
							"Marsenca, Piemonte Cortese",
							"Comte de Bergon, Blanc",
							"Comte de Bergon, Ros\xE9",
							"Comte de Bergon, Rouge",
							"Gavi di Gavi",
							"Bergon chardonnay",
							"Campechano Air\xE9n",
							"Saint-V\xE9ran Vielles Vignes, Domaine Rivet",
							"Bergon syrah",
							"M\xE2con-Charnay, Cave Charnay-les-M\xE2con",
							"Saint-V\xE9ran, Cave les-M\xE2con-Charnay",
							"Bergon grenache",
							"Palestra Rueda Verdejo",
							"Cava Brut, Planas Albareda",
							"Campechano Verdejo",
							"Los Galanes Sauvignon Blanc-Macabeo",
							"Calvente Xate-O",
							"Calvente Guindalera Tinto",
							"Veleta Nolad\xF3s",
							"Garcia de Verdevique Tinto joven",
							"Garcia de Verdevique Tinto Crianza",
							"Fuente Victoria Sulayr",
							"Calvente Laguin-da",
							"Veleta Cabernet Sauvignon Roble",
							"Mendez Moya Tinto",
							"Veleta vijiriega",
							"Calvente Guindalera Blanco",
							"Fuente Victoria Syrah",
							"Red La Sima tempranillo",
							"Pio del ramo Vi\xF1a Betola Wit (Cat wine)",
							"Se\xF1orio de Nevada Cabernet-Merlot (Brons)",
							"Se\xF1orio de Nevbada Syrah-Merlot (Zilver)",
							"Se\xF1orio de Nevada Blanco",
							"Pagos de Indalia Flor de Indalia",
							"Senda de las Rochas Bobal Roble",
							"Pio del Ramo Pio Eco monastrell",
							"Dominio de Ontur Syrah-Monastrell",
							"Dominio de Ontur Patre",
							"R\xE9gni\xE9  Vin Sauvage \xE1 Poil",
							"Vin Nature \xE1 Butiner Beaujolais Villages",
							"Beaujolais Imperial Ros\xE9 Domaine Romy",
							"Ch\xE2teau de Lavernette Cr\xE9mant de Bourgogne",
							"Ch\xE2teau de Lavernette Pouilly Fuiss\xE9",
							"Fleurie 2015 Domaine Gilles Cop\xE9ret",
							"Fleurie Domaine de la Bouroni\xE8re",
							"Du Toitskloof Pinotage Ros\xE9",
							"Boplaas Cape Tawny",
							"Boplaas The Chocolate Cape Vintage 2015",
							"Du Toitskloof Chenin Blanc",
							"Du Toitskloof Chardonnay",
							"Du Toitskloof Cabernet Sauvignon",
							"Du Toitskloof Dimension",
							"Boplaas Red Dessert",
							"Boplaas Muscadel",
							"Loescher Bremmer Calmont",
							"Bachero",
							"Baden Grauburgunder Kabinett Trocken",
							"Baden Rivaner Trocken",
							"Sauvignon blanc, Gebr. Ludwig",
							"Grauburgunder barrique, Gebr. Ludwig",
							"Argument, Heretat de Taverners",
							"Graciano, Heretat de Taverners",
							"Grauburgunder, Winkler-Hermaden bio",
							"Gew\xFCrztraminer, Winkler-Hemaden",
							"Riesling Petersbuckel, Wilhelmshof",
							"Riesling Krone, Tesch",
							"Riesling Sekt Extra Brut, Wilhelmshof",
							"Weisser Burgunder Im Sonnenschein, Wilhelmshof",
							"Silvaner Gutswein, Hans Wirsching",
							"Scheurebe Alte Reben, Iph\xF6fer Kronsberg 1e Lage, Hans Wirsching",
							"Deep blue blanc de noir, Tesch",
							"Papa Riesling, Meine Freiheit",
							"Ridgeback Vansha",
							"Ridgeback Vansha Farming Viognier",
							"Ridgeback Shiraz",
							"Balgownie Estate Cabernet Sauvignon",
							"Balgownie Estate Shiraz",
							"Calabria Estate 3Bridges Shiraz",
							"Schwarzb\xF6ck Grauburgunder Reserve",
							"Calabria Estate 3Bridges Cabernet Sauvignon",
							"Calabria Estate Franseco Grand Tawny",
							"Rechsteiner Manzoni Bianco",
							"Rechsteiner Chardonnay",
							"Rechsteiner Carmenere",
							"Castelforte Pinot Grigio",
							"Ridgeback Lion Hound White",
							"Cantine Riondo Collezione Soave Spumante Brut",
							"Cantine Riondo Frizzante Pink",
							"Casa Lunardi Chardonnay",
							"Quinta de Aves Ros\xE9",
							"Quinta de Aves Badia",
							"Quinta de Aves Noctua Ensamblaje",
							"Paladin Agricanto",
							"Domaine de Menard  Connoisseur Le Cheval Marin",
							"Roter Veltliner",
							"Mission Estate  Reserve Malbec",
							"Tenute Silvio Nardi Brunello di Montalcino",
							"Bodegas del Medievo Tuerce Botas Tempranillo Blanco",
							"El Escoces Volante Papa Luna",
							"Alsace Sylvaner",
							"Selection branco",
							"Alvarinho",
							"Gr\xFCner Veltliner 'Selektion'",
							"Zweigelt 'Selektion'",
							"Riesling 'Selektion'",
							"Riesling 'Selektion'",
							"Nana Branco",
							"Anselma Giacomo - Barolo Collaretto DOCG 2011",
							"Franco Boasso - Roero Arneis DOCG 2018",
							'Germano Ettore - Langhe "Herzu" DOC 2017',
							'Cagliero - Langhe Bianco "RABEL" DOC 2016',
							"Anselma Giacomo - Dolcetto d'Alba DOC 2017",
							'Cagliero - Dolcetto d\'Alba "Nonna Marcellina" DOC 2016',
							"Anselma Giacomo - Barbera d'Alba DOC 2017",
							"Luigi Pira - Barolo Serralunga DOCG 2014",
							"Anselma Giacomo - Langhe Nebbiolo DOC 2016",
							"Luigi Pira - Barbera d'Alba Superiore DOC 2016",
							"Luigi Pira - Langhe Nebbiolo DOC 2016",
							"Mazzini - Langhe Rosso DOC 2017",
							'Cagliero - Langhe Nebbiolo "Canebbio" DOC 2013',
							"Lacrau reserva",
							"Solar dos Lobos Exclusive Collection Blanco",
							"Solar dos Lobos Exclusive Collection Tinto",
							"Champagne Moutardier - Carte d'Or Brut 75cl",
							"Champagne Moutardier - Carte d'Or Brut 37,5cl",
							"Champagne Moutardier - Cuv\xE9e Ros\xE9e 75cl",
							"Auxerrois",
							"Dornfelder",
							"Edition Z",
							"Spaetburgunder",
							"Givry Rouge 1er Cru 2017",
							"Hautes Cotes de Beaune Rouge 2017",
							"Bourgogne Pinot Noir 2017",
							"Bourgogne Chardonnay 2015",
							"Bouzeron 2016",
							"Porta da Ravessa Reserva Tinto",
							"Porta da Ravessa Reserva Blanco",
							"C\xF3dega do Larinho",
							"AR Triplo",
							"Ridgeback Lion Hound Red",
							"Waris Hubert Champagne Lilyale",
							"Balsamino Marche Rosso IGT Vini Venturi",
							"Champagne Moutardier - Mill\xE9sim\xE9 2008 75cl",
							"Champagne Moutardier - Cuv\xE9e Ros\xE9e 37,5cl",
							"Champagne Moutardier - Pure Meunier Brut Nature 75cl",
							"Feravino Francesca Brut",
							"Feravino Grasecco Brut",
							"Madirazza Po\u0161ip",
							"PP Orahovica Gra\u0161evina",
							"Squarciafico Marche rosso IGP Vini Venturi",
							"Vina Cari\u0107 Bogdanju\u0161a",
							"Pasqua Romeo & Juliet Passimento Bianco",
							"Tradi\xE7\xE3o Boal 2015",
							"Qudi Verdicchio dei Castelli di Jesi Classico Superiore DOCG Vini Venturi",
							"Castelforte Corvina Veronese",
							"Paladin Malbech Gli Aceri",
							"Terroir Margaux",
							"Desiderio Marche Bianco Vini Venturi",
							"Morellino di Scansano DOCG",
							"PX Dry, barrel fermented",
							"Arinto",
							"Weisser Burgunder Muschelkalk",
							"Iuris Tempera",
							"PZ Svir\u010De Hadrian Pro\u0161ek",
							"Feravino Dika Zweigelt",
							"Feravino Dika Ros\xE9",
							"PP Orahovica Frankovka Ros\xE9",
							"Feravino Grasecco Extra Brut",
							"PZ Svir\u010De Plavac",
							"Vina Cari\u0107 Jubo'v",
							"Vina Cari\u0107 Plovac Plo\u0161ki",
							"Kabola Mu\u0161kat Momjanski",
							"Kabola Malvazija",
							"PP Orahovica Gra\u0161evina Premium",
							"Etna Bianco DOC Benanti",
							"Etna Rosso DOC Benanti",
							"Cerasuolo di Vittoria DOCG Avide",
							"Cirneco, Etna Rosso DOC (Cru)",
							"Barocco, Cerasuolo di Vittoria Classico DOCG (Cru)",
							"Maria Stella, Insolia IGT",
							"Frappato 1607, Frappato IGT",
							"Nerello Cappuccio IGT (monovitigno)",
							"Cuvee brut chardonnay 36 month",
							"La Rusticana, Malvasia IGT",
							"Argentinie",
							"Australie",
							"Bulgarije",
							"Chili",
							"Duitsland",
							"Frankrijk",
							"Griekenland",
							"Itali\xEB",
							"Nederland",
							"Nieuw-Zeeland",
							"Oostenrijk",
							"Portugal",
							"Sloveni\xEB",
							"Spanje",
							"Zuid-Afrika",
							"Zwitserland",
							"Hongarije",
							"Kroati\xEB",
							"Niet bekend",
							"abbuoto",
							"abouriou",
							"abrusco",
							"agiorgitiko",
							"air\xE9n",
							"albalonga",
							"aleatico",
							"alicante bouschet",
							"aligot\xE9",
							"altesse",
							"alvarinho",
							"amigne",
							"arneis",
							"arrufiac",
							"athiri",
							"auxerrois blanc",
							"bacchus",
							"baco blanc",
							"baco noir",
							"barbera",
							"baron",
							"blauburger",
							"blaufr\xE4nkisch",
							"bobal",
							"bonarda piemontese",
							"b\xEDborkadarka",
							"cabernet cortis",
							"cabernet franc",
							"cabernet sauvignon",
							"cainho branco",
							"carignan",
							"carm\xE9n\xE8re",
							"catarratto bianco",
							"catawba",
							"chardonnay",
							"chasselas blanc",
							"chatus",
							"chenin blanc",
							"cinsault",
							"clairette",
							"colombard",
							"cserszegi f\u0171szeres",
							"c\xE9sar",
							"dolcetto",
							"dornfelder",
							"dunkelfelder",
							"duras",
							"durif",
							"early burgundy",
							"elbling",
							"favorita",
							"fer servadou",
							"folle blanche",
							"furmint",
							"gamaret",
							"gamay",
							"garganega",
							"gew\xFCrztraminer",
							"grechetto",
							"grenache blanc",
							"grenache noir",
							"gros-manseng",
							"gr\xFCner veltliner",
							"humagne blanche",
							"h\xE1rslevel\u0171",
							"inzolia",
							"irsai oliv\xE9r",
							"isabella",
							"johaniter",
							"juhfark",
							"juran\xE7on",
							"kadarka",
							"kerner",
							"kir\xE1lyle\xE1nyka",
							"knipperl\xE9",
							"k\xE9knyel\u0171",
							"lambrusco",
							"len de l'el",
							"leon millot",
							"lladoner pelut",
							"madeleine royale",
							"malbec",
							"marechal foch",
							"marsanne",
							"mauzac blanc",
							"melon de bourgogne",
							"merlot",
							"merlot blanc",
							"meunier",
							"morio-muscat",
							"mourv\xE8dre",
							"muscadelle",
							"muscat",
							"muscat bailey a",
							"muscat bleu",
							"m\xFCller-thurgau",
							"nebbiolo",
							"nero d'avola",
							"n\xE9grette",
							"olaszrizling",
							"ortega",
							"parellada",
							"petit verdot",
							"petit-manseng",
							"petite arvine",
							"picolit",
							"picpoul blanc",
							"picpoul noir",
							"pinot blanc",
							"pinot gris",
							"pinot meunier",
							"pinot noir",
							"pinotage",
							"plavac mali",
							"pressac",
							"prior",
							"procanico",
							"prosecco",
							"regent",
							"ribier",
							"rieslaner",
							"riesling",
							"rondo",
							"roussanne",
							"roussette",
							"royalty",
							"sagrantino",
							"salom\xE9",
							"sangiovese",
							"sankt of saint laurent",
							"sauvignon blanc",
							"scheurebe",
							"schiava grossa",
							"seyval blanc",
							"solaris",
							"sylvaner",
							"syrah",
							"s\xE9millon",
							"tannat",
							"tauberschwarz",
							"tempranillo",
							"terret blanc",
							"terret gris",
							"terret noir",
							"timorasso",
							"tinta barroca",
							"tinta francisca",
							"tinto c\xE3o",
							"torront\xE9s",
							"touriga franca",
							"touriga nacional",
							"tressot",
							"tur\xE1n",
							"ugni blanc",
							"verdejo",
							"verdicchio",
							"vermentino",
							"vidal blanc",
							"viognier",
							"vitura",
							"vroege van der laan",
							"zala gy\xF6ngye",
							"zala gy\xF6ngye (perle von zala)",
							"zierfandler",
							"zinfandel",
							"zweigelt",
							"\xF6k\xFCzg\xF6z\xFC",
							"maturana blanca",
							"maturana tinta",
							"monastel de rioja",
							"albar\xEDn blanco",
							"albar\xEDn tinto",
							"palomino fino",
							"rufete blanco",
							"rufete",
							"garnacha",
							"mencia",
							"carrasqu\xEDn",
							"malvar",
							"albillo-moscatel de grano menudo",
							"cartoxia",
							"moscatel de grano menudo",
							"mand\xF3",
							"trebbiano",
							"ansonica",
							"grolleau",
							"babi\u0107",
							"crljenak",
							"po\u0161ip",
							"mare\u0161tina",
							"bogdanu\u0161a",
							"vugava",
							"moslavac",
							"soml\xF3",
							"sopron",
							"szeksz\xE1rd",
							"k\xE9kfrankos",
							"aragones",
							"fr\xFChburgunder",
							"cortese",
							"grenache gris",
							"macabeo",
							"xarello",
							"bonarda",
							"malvasia",
							"vijiriega",
							"muskaat alexandrie",
							"jaen blanco",
							"graciano",
							"Niet bekend",
							"Shiraz",
							"manzoni",
							"corvina",
							"corvinone",
							"rondinella",
							"pinot grigio",
							"soave",
							"roboso",
							"tai rosso",
							"pedro ximenez",
							"wagram",
							"arinto",
							"azal",
							"trajadura",
							"avesso",
							"monastrell",
							"gavi",
							"moscato",
							"brachetto",
							"croatina",
							"trincadeira",
							"fern\xE3o pires",
							"grauburgunder",
							"weissburgunder",
							"auxerrois",
							"spaetburgunder",
							"Gra\u0161evina",
							"Istarska Malvazija",
							"Frankovka",
							"Traminac",
							"Mu\u0161kat Momjanski",
							"Vranac",
							"Teran",
							"Silvanac Zeleni",
							"montepulciano",
							"Carricante",
							"nerello mascalese"
						]
					},
					// Data src [Array, Function, Async] | (REQUIRED)
					placeHolder: "Zoeken",
					// Place Holder text                 | (Optional)
					selector: "#autoComplete",
					// Input field selector              | (Optional)
					threshold: 0,
					// Min. Chars length to start Engine | (Optional)
					searchEngine: "strict",
					// Search Engine type/mode           | (Optional)
					resultsList: {
						// Rendered results list object      | (Optional)
						container: function container(source) {
							resultsListID = "zoekresultaten";
							return resultsListID;
						},
						destination: document.querySelector("#autoComplete"),
						position: "afterend"
					},
					resultItem: function resultItem(data, source) {
						// Rendered result item            | (Optional)
						return "".concat(data.match);
					},
					highlight: true,
					// Highlight matching results      | (Optional)
					maxResults: 5,
					// Max. number of rendered results | (Optional)
					onSelection: function onSelection(feedback) {
						// Action script onSelection event | (Optional)
						document.querySelector("#autoComplete").value =
							feedback.selection;
						document.querySelector("#searchform").submit();
					}
				});

				/***/
			},

		/***/ 1:
			/*!*********************************!*\
  !*** multi ./js/search_form.js ***!
  \*********************************/
			/*! no static exports found */
			/***/ function(module, exports, __webpack_require__) {
				module.exports = __webpack_require__(
					/*! /Users/mitch/Documents/Doede Jaarsma communicatie/Projecten/wp/wp-content/themes/vmw_badubed/js/search_form.js */ "./js/search_form.js"
				);

				/***/
			}

		/******/
	}
);
