#include "carte.h"
#include <stdio.h>

int can_play(const Joueur *joueur, const Carte *carte, int row, int col) {
    if (col >= 5 || row >= 3) {
        return 0;  
    }
    if (carte->niveau == Niveau_1) {
        return 1;  
    }
    
    if (carte->niveau == Niveau_2) {
        return joueur->cartes_j[0][col].force > 0;  
    }
   
    if (carte->niveau == Niveau_3) {
        return joueur->cartes_j[1][col].force > 0;  
    }
    return 0;  
}


void play_time(Joueur *joueur, int index, Carte map[3][5]) {
    int placed = 0;

    for (int row = 0; row < 3 && !placed; row++) {
        for (int col = 0; col < 5 && !placed; col++) {
            if (map[row][col].force == 0 && can_play(joueur, &joueur->carte_j[index], row, col)) {
                map[row][col] = joueur->carte_j[index]; 
                joueur->score += joueur->carte_j[index].force; 
                joueur->carte_j[index].force = 0;
                placed = 1; 
            }
        }
    }

    // Si la carte n'a pas pu être placée, affichez un message
    if (!placed) {
        printf("Aucune position valide n'est disponible pour placer la carte!\n");
    }
}


void tourJoueur(Joueur *joueur, Carte map[3][5]) {
    int choix;

    show_carte_played(joueur);
    printf("Choisissez une carte à jouer (1 à %d ou -1 pour passer): ", 5);
    scanf("%d", &choix);

    if (choix == -1) {
        printf("Vous avez choisi de passer.\n");
        return;
    }

    if (choix < 1 || choix > 5 || joueur->carte_j[choix - 1].force < 0) {
        printf("Choix invalide, tour annulé.\n");
        return;
    } else {
        const char *couleurs[] = {"Blanc", "Gris", "Noir", "Bleu", "Orange", "Rouge", "Violet", "Rose", "Jaune", "Vert"};
        printf("\n--- Vous avez choisi ---\n[-niveau: %d -couleur: %s -force: %d]\n",
               joueur->carte_j[choix - 1].niveau,
               couleurs[joueur->carte_j[choix - 1].couleur], 
               joueur->carte_j[choix - 1].force);
    }

    play_time(joueur, choix - 1, map);
    printf("État du tableau après votre coup:\n");
    show_tab(joueur);
}
