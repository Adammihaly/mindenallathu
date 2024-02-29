const Animal = 
{
	Haziallat:
	{
		Kutya:
		[
			'Afgán Agár',
			'Alaszkai malamut',
			'Amerikai Cocker Spaniel',
			'Amerikai Bulldog',
			'Amerikai Vizispániel',
			'Amerikai Staffordshire terrier',
			'Ausztrál Terrier',
			'Angol bulldog',
			'Basenji',
			'Beagle',
			'Belga Griffon',
			'Berni Pásztorkutya',
			'Boxer',
			'Bullterrier',
			'Bulldog',
			'Csau Csau',
			'Csivava',
			'Dalmata',
			'Erdélyi Kopó',
			'Eurázsiai',
			'Foxterrier',
			'Francia Vizsla',
			'Francia Bulldog',
			'Golden Retriever',
			'Havannai Pincs',
			'Ír Szetter',
			'Japán Spitz',
			'Kaukázusi',
			'Kis Angol Agár',
			'Komondor',
			'Kuvasz',
			'Labrador retriever',
			'Leonbergi',
			'Lengyel Alföldi Juhászkutya',
			'Magyar Vizsla',
			'Mexikói mesztelen kutya',
			'Nápolyi Masztiff',
			'Német Dog',
			'Német Spicc',
			'Német juhászkutya',
			'Olasz Griffon',
			'Papillon',
			'Rottweiler',
			'Puli',
			'Pumi',
			'Törpe Schnauzer',
			'Shar Pei',
			'H. Skót Juhászkutya',
			'Skót Terrier',
			'Sussexi Spániel',
			'Szamojéd',
			'Szibériai Husky',
			'Tacskó',
			'Tosza Inu',
			'Uszkár',
			'Újfunlandi',
			'Yorkshier Terrier',
			'West Highland Terrier'
		],
		Macska:
		[
			'Abesszin',
			'Amerikai rövidszőrű',
			'Norvég',
			'Bengáli',
			'Török angóra',
			'Burma',
			'Ragdoll',
			'Burmilla',
			'Birman',
			'Maine coon',
			'British Burmese',
			'Perzsa',
			'Egyiptomi Mau',
			'Karthauzi',
			'Man-Szigeti',
			'Szfinx',
			'Sziámi'
		]
	},
	Haszonallat:
	{
		Baromfi:
		[
			'Házi tyúk',
			'Házi kacsa',
			'Emu',
			'Házi lúd',
			'Kék páva',
			'Strucc',
			'Házi galamb',
			'Fürj',
			'Házi pulyka',
			'Gyöngy tyúk'
		],
		Juh:
		[
			'Merino ',
			'Kameruni ',
			'Racka ',
			'Cigája ',
			'Suffolk',
			'Texel',
			'Berrichon'
		],
		Kecske:
		[
			'Alpesi kecske',
			'Magyar parlagi',
			'Nemesített fehér / őzszínű',
			'Törpe kecskék'
		],
		Ló:
		[
			'Andalúz',
			'Arab telivér',
			'Angol telivér',
			'Hucul',
			'Gidrán',
			'Lipicai',
			'Mezőhegyesi',
			'Muraközi',
			'Nonius',
			'Póni',
			'Shagya'
		],
		Sertés:
		[
			'Házisertés',
			'Mangalica',
			'Meishan',
			'Duroc',
			'Pietrain',
			'Vietnámi csüngőshasú',
			'Vaddisznó'
		],
		Marha:
		[
			'Magyar tarka',
			'Szürke marha',
			'Horstein',
			'Hereford',
			'Jersey'
		],
		Nyúl:
		[
		 	'Házi nyúl'
		]
	},
	Diszallat:
	{
		Díszhal:
		[
			'Jukatáni fogasponty',
			'Szumátrai díszmárna',
			'Platti',
			'Zebradánió',
			'Szivárványos guppik',
			'Törperazbóra',
			'Algaevő harcsa',
			'Lazacfélék',
			'Kékpajzsos páncélos harcsa',
			'Vitorláshal',
			'Pöttyös páncélos harcsa',
			'Kínai paradicsomhal',
			'Boeseman kalászhal',
			'Gurámik'
		],
		Díszmadár:
		[
			'Hullámos papagájok',
			'Kanárik',
			'Zebrapintyek',
			'Kakadu',
			'Rozella papagáj',
			'Nimfapapagáj'
		],
		Gyíkfélék:
		[
			'Galléros gyík',
			'Zöld leguán',
			'Sisakos baziliszkusz',
			'Szavanna varánusz',
			'Vörösszemű krokodilszkink',
			'Gekko',
			'Kéknyelvűszkin'
		],
		Kígyófélék:
		[
			'Közönséges óriáskígyó',
			'Nyugati homokiboa',
			'Vörös gabonasikló',
			'Királysikló',
			'Fekete patkánysikló',
			'Zöld fűsikló',
			'Királypiton',
			'Kockás piton'
		],
		Pókok:
		[
			'Mexikói vöröstérdű tarantula',
			'Mettalica',
			'Közönséges madárpók'
		],
		Rágcsálók:
		[
			'Kínai csíkos törpehörcsög ',
			'Roborovszki törpehörcsög',
			'Csincsilla ',
			'Csíkos fűegér',
			'Törpenyulak ',
			'Tengerimalac',
			'Degu ',
			'Belga kopasz malac',
			'Csuklyás patkány ',
			'Mongol futóegér',
			'Ecsetfarkú pele ',
			'Afrikai fehérhasú törpesün',
			'Szíriai aranyhörcsög ',
			'Japán táncoló egér',
			'Dzsungária törpehörcsög ',
			'Vadászgörény'
		]
	}
};

// absolute tragedy

const AnimalSpecie = document.getElementById('allat_fajtaja'); 			// dropdown list (dog => terrier)

const AnimalCategory = document.getElementById('allat_kategoriaja'); 	// dropdown list
AnimalCategory.addEventListener('change', function()
{
	FillTypeList();
});
const AnimalType = document.getElementById('allat_fele'); 				// dropdown list (dog, cat)
AnimalType.addEventListener('change', function()
{
	FillSpecieList();
});

function FillTypeList()
{
	ClearList(AnimalType);
	for(let array in Animal[AnimalCategory.value])
		AnimalType.appendChild(new Option(array, array));

	FillSpecieList(); // shits and giggles
}
function FillSpecieList()
{
	ClearList(AnimalSpecie);
	Animal[AnimalCategory.value][AnimalType.value].forEach(element => {
		AnimalSpecie.appendChild(new Option(element, element));
	});
}
function ClearList(Node)
{
	for(let i = Node.childElementCount - 1; i >= 0; --i)
		Node.children[i].remove();	
}